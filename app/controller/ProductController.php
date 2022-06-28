<?php

namespace App\Controller;

use Core\Controller;
use PDO;

class ProductController extends Controller{
    public function index()
    {
        global $db;

        $id = arrayGet($_GET, 'id');
        $username = arrayGet($_GET, 'username');
        $categoryId = arrayGet($_GET, 'category_id');
        $hot = arrayGet($_GET, 'hot', '');

        $query = "SELECT product.*, category.name as c_name FROM `product`
              left join category on product.category_id = category.id";

        $hasSearch = false;
        if ($id) {
            $query .= $hasSearch ? " and " : "" . " where product.id = '$id'";
            $hasSearch = true;
        }
        if ($username) {
            $and = $hasSearch ? " and " : " where ";
            $query .= "$and product.name like '%$username%'";
            $hasSearch = true;
        }
        if ($categoryId) {
            $and = $hasSearch ? " and " : " where ";
            $query .= "$and product.category_id = '$categoryId'";
            $hasSearch = true;
        }
        if ($hot) {
            $and = $hasSearch ? " and " : " where ";
            $query .= "$and product.hot = '$hot'";
        }

        $query .= " ORDER BY product.id DESC";

//        echo $query;die;

        $query = $db->prepare($query);
        $query->execute();
        $dataList = $query->fetchAll();

        // get list category
        $query2 = $db->prepare("select * from `category`");
        $query2->execute();
        $dataCategory = $query2->fetchAll();

        $viewData = [
            'dataList' => $dataList,
            'dataCategory' => $dataCategory,
        ];

        return $this->render('product/index', $viewData);
    }

    public function create()
    {
        return $this->render('product/create');
    }

    public function store()
    {
        global $db;

        $username = arrayGet($_POST, 'username');
        $email = arrayGet($_POST, 'email');
        $phone = arrayGet($_POST, 'phone');
        $address = arrayGet($_POST, 'address', '');

        // Validate
        $errorValidate = [];
        $findUsername = $db->query("SELECT * FROM user where username='$username'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findUsername)) {
            $errorValidate['username'] = 'Username đã tồn tại';
        }

        $findEmail = $db->query("SELECT * FROM user where email='$email'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findEmail)) {
            $errorValidate['email'] = 'Email đã tồn tại';
        }

        $findPhone = $db->query("SELECT * FROM user where phone='$phone'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findPhone)) {
            $errorValidate['phone'] = 'SĐT đã tồn tại';
        }

        if (count($errorValidate) > 0) {
            $_SESSION['errorValidate'] = $errorValidate;
            $_SESSION['data'] = $_POST;
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $sql = "INSERT INTO user (username, email, phone, address) VALUES ('$username', '$email','$phone', '$address')";
        $db->exec($sql);
        $_SESSION['message'] = 'Thêm thành công';

        return header('Location:' . WEB_ROOT);
    }

    public function edit()
    {
        try {
            $id = arrayGet($_GET, 'id');
            global $db;
            $query = $db->prepare("SELECT * FROM `user` WHERE id =$id");
            $query->execute();
            $data = $query->fetch();

            $viewData = [
                'data' => $data
            ];

            return $this->render('product/edit', $viewData);
        } catch (\Exception $e) {
            return loadError();
        }
    }

    public function update()
    {
        global $db;
        $id = arrayGet($_GET, 'id');

        $username = arrayGet($_POST, 'username');
        $email = arrayGet($_POST, 'email');
        $phone = arrayGet($_POST, 'phone');
        $address = arrayGet($_POST, 'address', '');

        // Validate
        $errorValidate = [];
        $findUsername = $db->query("SELECT * FROM user where username='$username' and id != '$id'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findUsername)) {
            $errorValidate['username'] = 'Username đã tồn tại';
        }

        $findEmail = $db->query("SELECT * FROM user where email='$email' and id != '$id'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findEmail)) {
            $errorValidate['email'] = 'Email đã tồn tại';
        }

        $findPhone = $db->query("SELECT * FROM user where phone='$phone' and id != '$id'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findPhone)) {
            $errorValidate['phone'] = 'SĐT đã tồn tại';
        }

        if (count($errorValidate) > 0) {
            $_SESSION['errorValidate'] = $errorValidate;
            $_SESSION['data'] = $_POST;
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $sql = "UPDATE user SET username = ?, email=?, phone=?, address=? WHERE id=$id";
        $db->prepare($sql)->execute([$username, $email, $phone, $address]);
        $_SESSION['message'] = "Cập nhật thành công";

        return header('Location: ' . WEB_ROOT);
    }

    public function delete() {
        global $db;
        $id = arrayGet($_GET, 'id');

        $sql = "DELETE FROM `product` WHERE id=$id";
        $db->exec($sql);
        $_SESSION['message'] = 'Xóa thành công';

        return header('Location: ' . WEB_ROOT);
    }
}

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

        $query = "SELECT * FROM user";
        if ($id && $username) {
            $query .= " where id = '$id' and username like '%$username%'";
        } else if ($id) {
            $query .= " where id = '$id'";
        } else if ($username) {
            $query .= " where username like '%$username%'";
        }
        $query .= " ORDER BY id DESC";

        $query = $db->prepare($query);
        $query->execute();
        $dataList = $query->fetchAll(); // foreach

        $viewData = [
            'dataList' => $dataList
        ];

        return $this->render('user/index', $viewData);
    }

    public function create()
    {
        return $this->render('user/create');
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

            return $this->render('user/edit', $viewData);
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

        $sql = "DELETE FROM `user` WHERE id=$id";
        $db->exec($sql);
        $_SESSION['message'] = 'Xóa thành công';

        return header('Location: ' . WEB_ROOT);
    }
}

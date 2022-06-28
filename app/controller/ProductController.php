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
        global $db;
        // get list category
        $query2 = $db->prepare("select * from `category`");
        $query2->execute();
        $dataCategory = $query2->fetchAll();

        $viewData = [
            'dataCategory' => $dataCategory,
        ];

        return $this->render('product/create', $viewData);
    }

    public function store()
    {
        global $db;

        $name = arrayGet($_POST, 'name');
        $sortDescribe = arrayGet($_POST, 'sort_describe');
        $categoryId = arrayGet($_POST, 'category_id');
        $priceOrigin = (int)arrayGet($_POST, 'price_origin');
        $sale = (int)arrayGet($_POST, 'sale');
        $priceSell = $priceOrigin - ($priceOrigin * (int)$sale / 100);

        $errorValidate = [];
        if(!empty($_FILES['avatar']['name'])) {
            $file_name = $_FILES['avatar']['name'];
            $file_size = $_FILES['avatar']['size'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $imageFileType = strtolower(pathinfo(basename($_FILES["avatar"]["name"]),PATHINFO_EXTENSION));
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($imageFileType, $extensions) === false) {
                $errorValidate['avatar'] = 'Vui lòng chọn ảnh JPEG or PNG';
            }

            if ($file_size > 2097152) {
                $errorValidate['avatar'] = 'File upload tối đa 2MB';
            }

            if (count($errorValidate) > 0) {
                $_SESSION['errorValidate'] = $errorValidate;
                return header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

            if (empty($errorValidate) == true) {
                $fileName = "public/image/product/" .  time() . '_' .$file_name;
                move_uploaded_file($file_tmp, $fileName);
            }
        } else {
            $fileName = '';
        }

        $sql = "INSERT INTO product (name, sort_describe, category_id, price_origin, sale, price_sell, avatar) VALUES 
                                  ('$name', '$sortDescribe','$categoryId', '$priceOrigin', '$sale', '$priceSell', '$fileName')";
        $db->exec($sql);
        $_SESSION['message'] = 'Thêm thành công';

        return header('Location:' . WEB_ROOT . 'product');
    }

    public function edit()
    {
        try {
            $id = arrayGet($_GET, 'id');
            global $db;
            $query = $db->prepare("SELECT * FROM `product` WHERE id =$id");
            $query->execute();
            $data = $query->fetch();

            // get list category
            $query2 = $db->prepare("select * from `category`");
            $query2->execute();
            $dataCategory = $query2->fetchAll();

            $viewData = [
                'data' => $data,
                'dataCategory' => $dataCategory,
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

        $name = arrayGet($_POST, 'name');
        $hot = arrayGet($_POST, 'hot');
        $sortDescribe = arrayGet($_POST, 'sort_describe');
        $categoryId = arrayGet($_POST, 'category_id');
        $priceOrigin = (int)arrayGet($_POST, 'price_origin');
        $sale = (int)arrayGet($_POST, 'sale');
        $priceSell = $priceOrigin - ($priceOrigin * (int)$sale / 100);

        $errorValidate = [];
        if(!empty($_FILES['avatar']['name'])) {
            $file_name = $_FILES['avatar']['name'];
            $file_size = $_FILES['avatar']['size'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $imageFileType = strtolower(pathinfo(basename($_FILES["avatar"]["name"]),PATHINFO_EXTENSION));
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($imageFileType, $extensions) === false) {
                $errorValidate['avatar'] = 'Vui lòng chọn ảnh JPEG or PNG';
            }

            if ($file_size > 2097152) {
                $errorValidate['avatar'] = 'File upload tối đa 2MB';
            }

            if (count($errorValidate) > 0) {
                $_SESSION['errorValidate'] = $errorValidate;
                return header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

            if (empty($errorValidate) == true) {
                $fileName = "public/image/product/" .  time() . '_' .$file_name;
                move_uploaded_file($file_tmp, $fileName);
            }
        } else {
            $fileName = arrayGet($_POST, 'file_name');
        }

        $sql = "UPDATE product SET name = ?, sort_describe=?, category_id=?, price_origin=?, sale=?, price_sell=?, hot=?, avatar=? WHERE id=$id";
        $db->prepare($sql)->execute([$name, $sortDescribe, $categoryId, $priceOrigin, $sale, $priceSell, $hot, $fileName]);
        $_SESSION['message'] = "Cập nhật thành công";

        return header('Location: ' . WEB_ROOT . 'product');
    }

    public function delete() {
        global $db;
        $id = arrayGet($_GET, 'id');

        $sql = "DELETE FROM `product` WHERE id=$id";
        $db->exec($sql);
        $_SESSION['message'] = 'Xóa thành công';

        return header('Location: ' . WEB_ROOT . 'product');
    }
}

<?php

namespace App\Controller;

use Core\Controller;
use PDO;

class CategoryController extends Controller{
    public function index()
    {
        global $db;

        $query = $db->prepare("Select * from category order by id desc");
        $query->execute();
        $dataList = $query->fetchAll(); // foreach

        $viewData = [
            'dataList' => $dataList
        ];

        return $this->render('category/index', $viewData);
    }

    public function create()
    {
        return $this->render('category/create');
    }

    public function store()
    {
        global $db;

        $name = arrayGet($_POST, 'name');

        // Validate
        $errorValidate = [];
        $findName = $db->query("SELECT * FROM `category` where name='$name'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findName)) {
            $errorValidate['name'] = 'Tên danh mục đã tồn tại';
        }

        if (count($errorValidate) > 0) {
            $_SESSION['errorValidate'] = $errorValidate;
            $_SESSION['data'] = $_POST;
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $sql = "INSERT INTO category (name) VALUES ('$name')";
        $db->exec($sql);
        $_SESSION['message'] = 'Thêm thành công';

        return header('Location:' . WEB_ROOT . 'category');
    }

    public function edit()
    {
        try {
            $id = arrayGet($_GET, 'id');
            global $db;
            $query = $db->prepare("SELECT * FROM `category` WHERE id =$id");
            $query->execute();
            $data = $query->fetch();

            $viewData = [
                'data' => $data
            ];

            return $this->render('category/edit', $viewData);
        } catch (\Exception $e) {
            return loadError();
        }
    }

    public function update()
    {
        global $db;
        $id = arrayGet($_GET, 'id');

        $name = arrayGet($_POST, 'name');

        // Validate
        $errorValidate = [];
        $findUsername = $db->query("SELECT * FROM `category` where name='$name' and id != '$id'")->fetch(PDO::FETCH_ASSOC);
        if (!empty($findUsername)) {
            $errorValidate['name'] = 'Tên danh mục đã tồn tại';
        }

        if (count($errorValidate) > 0) {
            $_SESSION['errorValidate'] = $errorValidate;
            $_SESSION['data'] = $_POST;
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $sql = "UPDATE `category` SET name = ? WHERE id=$id";
        $db->prepare($sql)->execute([$name]);
        $_SESSION['message'] = "Cập nhật thành công";

        return header('Location: ' . WEB_ROOT . 'category');
    }

    public function delete() {
        global $db;
        $id = arrayGet($_GET, 'id');

        $sql = "DELETE FROM `category` WHERE id=$id";
        $db->exec($sql);
        $_SESSION['message'] = 'Xóa thành công';

        return header('Location: ' . WEB_ROOT . 'category');
    }
}

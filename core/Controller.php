<?php

namespace Core;

class Controller {
    public function model($model)
    {
        $tmpPath = ROOT . "/app/model/$model.php";
        if (!file_exists($tmpPath)) {
            return false;
        }

        require_once $tmpPath;

        $className = 'App\Model\\' . $model;
        if (!class_exists($className)) {
            return false;
        }

        return new $className();
    }

    public function render($view, $data = [])
    {
        extract($data);
        $tmpPath = ROOT . "/app/view/$view.php";
        if (!file_exists($tmpPath)) {
            return false;
        }

        require_once $tmpPath;
    }
}


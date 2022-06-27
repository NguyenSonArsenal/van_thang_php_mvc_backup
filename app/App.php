<?php

namespace App;

use Core\Route;

class App
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_route;

    public function __construct()
    {
        $this->_route = new Route();
        $this->handleUrl();
    }

    public function handleUrl()
    {
        $url = arrayGet($_SERVER, 'PATH_INFO', '/');
        $url = $this->_route->handleRoute($url);
        $this->_controller = arrayGet($url, 'c', 'Frontend/HomeController');
        $this->_action = arrayGet($url, 'a', 'index');
        $this->_params = [];

        // Handle class in controller
        $fileTmp = ROOT . "app/controller/$this->_controller.php";
        if (!file_exists($fileTmp)) {
            return loadError();
        }
        require_once $fileTmp;
        $className = "App\Controller\\$this->_controller";
        $className = str_replace('/', '\\', $className);
        if (!class_exists($className)) {
            return loadError();
        }
        $this->_controller = new $className();

        // Check method exists in controller
        if (!method_exists($this->_controller, $this->_action)) {
            return loadError();
        }

        call_user_func_array([$this->_controller, $this->_action], $this->_params);
        return true;
    }
}


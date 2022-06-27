<?php

namespace Core;

use PDO;

class Connection
{
    private static $instance = null;
    private static $conn = null;

    private function __construct()
    {
        try {
            $host = 'localhost';
            $dbName = 'php_mvc';
            $userName = 'root';
            $password = '';

            $conn = new PDO("mysql:host=$host;dbname=$dbName" , $userName , $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn = $conn;
        } catch (\Exception $e) {
            loadError('database', ['message' => $e->getMessage()]);
            die;
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            $connection = new Connection();
            self::$instance = self::$conn;
        }

        return self::$instance;
    }
}


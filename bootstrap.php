<?php

define('ROOT', __DIR__ . '/');
define('ROOT_VIEW', __DIR__ . '/app/view/');

if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}
$webRoot = $protocol . $_SERVER['SERVER_NAME'];
define('WEB_ROOT', $webRoot . '/van_thang_php_mvc_backup/');

require_once 'function.php';
require_once 'config/system.php';
require_once 'config/route.php';
require_once 'App/App.php';
require_once 'core/Route.php';
require_once 'core/Controller.php';
require_once 'core/Connection.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'core/Request.php';

$db = \Core\Connection::getInstance();

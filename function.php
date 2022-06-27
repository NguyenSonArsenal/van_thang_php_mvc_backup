<?php

function arrayGet($arr, $key, $default = '')
{
    if (!is_array($arr) || empty($arr[$key])) {
        return $default;
    }

    return $arr[$key];
}

function loadError($name = 404, $data = [])
{
    extract($data);
    require_once "app/error/$name.php";
}

function asset($path)
{
    return WEB_ROOT . '/public/' . ltrim($path, '/');
}

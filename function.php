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

function formatPriceCurrency($value = null)
{
    $result = is_null($value) ? '' : number_format((float)$value, 2, ',', '.');

    if (substr($result, -3) == ',00') {
        return substr($result, 0, strlen($result) - 3);
    }

    if (substr($result, -2) == ',0') {
        return substr($result, 0, strlen($result) - 2);
    }

    return $result;
}

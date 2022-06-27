<?php

$route = [
    '/' => ['method' => 'GET', 'use' => 'UserController@index'],
    'user/create' => ['method' => 'GET', 'use' => 'UserController@create'],
    'user/store' => ['method' => 'GET', 'use' => 'UserController@store'],
    'user/edit' => ['method' => 'GET', 'use' => 'UserController@edit'],
    'user/update' => ['method' => 'GET', 'use' => 'UserController@update'],
    'user/delete' => ['method' => 'GET', 'use' => 'UserController@delete'],

    'category' => ['method' => 'GET', 'use' => 'CategoryController@index'],
    'category/create' => ['method' => 'GET', 'use' => 'CategoryController@create'],
    'category/store' => ['method' => 'GET', 'use' => 'CategoryController@store'],
    'category/edit' => ['method' => 'GET', 'use' => 'CategoryController@edit'],
    'category/update' => ['method' => 'GET', 'use' => 'CategoryController@update'],
    'category/delete' => ['method' => 'GET', 'use' => 'CategoryController@delete'],

    'product' => ['method' => 'GET', 'use' => 'ProductController@index'],
    'product/create' => ['method' => 'GET', 'use' => 'ProductController@create'],
    'product/store' => ['method' => 'GET', 'use' => 'ProductController@store'],
    'product/edit' => ['method' => 'GET', 'use' => 'ProductController@edit'],
    'product/update' => ['method' => 'GET', 'use' => 'ProductController@update'],
    'product/delete' => ['method' => 'GET', 'use' => 'ProductController@delete'],
];

return $route;

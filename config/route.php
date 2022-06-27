<?php

$route = [
    '/' => ['method' => 'GET', 'use' => 'UserController@index'],
    'user/create' => ['method' => 'GET', 'use' => 'UserController@create'],
    'user/store' => ['method' => 'GET', 'use' => 'UserController@store'],
    'user/edit' => ['method' => 'GET', 'use' => 'UserController@edit'],
    'user/update' => ['method' => 'GET', 'use' => 'UserController@update'],
    'user/delete' => ['method' => 'GET', 'use' => 'UserController@delete'],
];

return $route;

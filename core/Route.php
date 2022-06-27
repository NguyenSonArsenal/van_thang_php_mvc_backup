<?php

namespace Core;

class Route {
    public function handleRoute($url = '')
    {
        global $route;

        if ($url != '/') {
            $url = trim($url, '/');
        }
        $url = filter_var($url, FILTER_SANITIZE_URL);

        $routeTmp = arrayGet($route, $url);
        if (empty($routeTmp)) {
            return [];
        }

        $useStr = arrayGet($routeTmp, 'use');
        $use = explode('@', $useStr);

        $result['c'] = arrayGet($use, 0); // controller
        $result['a'] = arrayGet($use, 1); // action
        $result['m'] = strtoupper(arrayGet($routeTmp, 'method')); // method

        return $result;
    }
}


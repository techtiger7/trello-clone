<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 11/12/18
 * Time: 7:02 PM
 */

namespace App\Core;

class Router
{

    private $routes = [
        'GET'=>[],
        'POST'=>[],
        'PUT'=>[],
        'DELETE'=>[],

    ];

    private function __construct()
    {
    }

    public static function load($routefile)
    {
        $router = new self;

        require_once $routefile;

        return $router;
    }

    public function matchFound($route_sub_paths, $sub_paths)
    {
        if (count($sub_paths) == count($route_sub_paths)) {

            for($i = 0; $i < count($sub_paths); $i++) {

                if($sub_paths[$i] != $route_sub_paths[$i]) {

                    // Check if the route sub path is a variable
                    if(!preg_match('/{[\w-]*}/i', $route_sub_paths[$i])) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function get($path, $controller)
    {
        if(!array_key_exists($path, $this->routes['GET']))
        {
            $this->routes['GET'][$path] = $controller;
        }
    }

    public function post($path, $controller)
    {
        if(!array_key_exists($path, $this->routes['POST']))
        {
            $this->routes['POST'][$path] = $controller;
        }
    }

    public function direct($method, $path) {

        $sub_paths = preg_split( '/\//', $path, NULL, PREG_SPLIT_NO_EMPTY);

        foreach ($this->routes[$method] as $route => $controller) {

            $route_sub_paths = preg_split('/\//', $route, NULL, PREG_SPLIT_NO_EMPTY);

            if ($this->matchFound($route_sub_paths, $sub_paths)) {
                return $controller;
            }

        }

        throw new \Exception("No such route as $path");
    }
}
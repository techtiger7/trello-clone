<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 11/12/18
 * Time: 7:02 PM
 */

class Router
{

    private static $routes = [
        'GET'=>[],
        'POST'=>[]
    ];

    public static function direct($route, $method)
    {
        PageController::$route;
    }

    public static function get($route, $controller)
    {
        static::$routes['GET'][$route] = new Controller($controller);
    }
}
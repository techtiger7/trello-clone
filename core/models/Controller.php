<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 11/12/18
 * Time: 9:38 PM
 */

class Controller
{
    private $controller;
    private $method;

    public function __construct($route)
    {
        $split = explode($route, '@');
        $this->controller = $split[0];
        $this->method = $split[1];

        echo $this->controller . ' - ' . $this->method;

    }
}
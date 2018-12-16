<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:50 PM
 * Description: Request class for accessing URI elements to route requests
 */

namespace App\Core;

class Request
{

    // Static class, empty contructor to avoid instantiation
    private function __construct()
    {
    }

    public static function getUriPath()
    {
        return (parse_url($_SERVER['REQUEST_URI'])['path']);
    }

    private function getUriSubPaths()
    {
        return explode(static::getUriPath());
    }


    public static function getMatchingRoute(){

    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getQuery()
    {
        return htmlspecialchars($_SERVER['QUERY_STRING']);
    }

    public static function validate()
    {

    }
}
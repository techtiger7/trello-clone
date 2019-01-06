<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 12/12/18
 * Time: 9:55 AM
 */

namespace App\Core;

/**
 * Class App
 * @package App\Core
 * @description A static dependency injection container for the application
 */
class App
{
    private static $dependencies = [];

    public static function bind($key, $value)
    {
        static::$dependencies[$key] = $value;
    }

    public static function get($key)
    {
        if(!array_key_exists($key, static::$dependencies)) {
            return new Exception("No $key dependency in container.");
        }
        return static::$dependencies[$key];
    }

}
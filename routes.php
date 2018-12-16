<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 9:32 PM
 */

use App\Core\Router;

$router->get('/', 'PagesController@index');

$router->get('/boards', 'PagesController@boards');

$router->get('/user/{id}/profile', 'UserController@show');

$router->get('/user/{id}/board/{id}', 'UserController@show<BoardController@show');

?>
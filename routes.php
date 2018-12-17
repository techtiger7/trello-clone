<?php
/**
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 9:32 PM
 *
 * Description: The configuration file for registering routes
 */


$router->get('/', 'PageController@index');

$router->get('/boards', 'PageController@boards');

$router->get('/user/{id}', 'UserController@show');

$router->get('/user/{id}/board/{id}', 'UserController@show<BoardController@show');

?>
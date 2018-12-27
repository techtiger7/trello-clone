<?php
/**
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 9:32 PM
 *
 * Description: The configuration file for registering routes
 */


$router->get('/', 'PageController@index');

$router->get('/login', 'PageController@login');

$router->post('login', 'UserController@login');

$router->get('/boards', 'BoardController@index');

$router->get('/boards/create', 'BoardController@create');

$router->post('/boards', 'BoardController@store');

$router->get('/boards/{id}/edit', 'BoardController@edit');

$router->patch('/boards/{id}', 'BoardController@update');

$router->delete('/boards/{id}', 'BoardController@destroy');

?>
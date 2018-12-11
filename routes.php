<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 9:32 PM
 */

Router::get('/', 'PagesController@index');

Router::get('/boards', 'PagesController@boards');
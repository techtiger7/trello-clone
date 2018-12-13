<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:49 PM
 */

require_once 'vendor/autoload.php';

use App\Core\{Router, Request};

//Router::direct(Request::uri(), Request::method());

$routes = array(
    'GET' => [
        '/' => 'PagesController@index',
        '/board/id' => 'BoardController@index',
        '/board/{id}' => 'BoardController@show',
        '/user/{id}/profile' => 'UserController@show',
        '/user/name/board/{id}' => 'UserController@show<BoardController@show'
        ]
);


// Strip the query from end of uri if it exists
$uri_sub_paths = preg_split( '/\//', strtok($_SERVER["REQUEST_URI"], '?'), NULL, PREG_SPLIT_NO_EMPTY);

$uri_sub_paths_count = count($uri_sub_paths);
var_dump($uri_sub_paths);

foreach ($routes['GET'] as $route => $controller) {

    $route_sub_paths = preg_split('/\//', $route, NULL, PREG_SPLIT_NO_EMPTY);

    echo "</br>";
    var_dump($route);
    echo "</br>";
    var_dump($route_sub_paths);
    echo "</br>";

    if(count($route_sub_paths) == $uri_sub_paths_count) {
        for ($i = 0; $i < $uri_sub_paths_count; $i++) {
            if ($uri_sub_paths[$i] != $route_sub_paths[$i]) {
                if (!preg_match('/{[\w-]*}/i', $route_sub_paths[$i])) {
                    echo "$uri_sub_paths[$i] does not match '$route_sub_paths[$i]'</br>";
                }
                elseif ($i == $uri_sub_paths_count - 1) {
                    die('Match found for ' . $route);
                }
                else {
                    echo $uri_sub_paths[$i] . " found as value for " . $route_sub_paths[$i] . ", continuing</br>";
                }
            }
            else {
                echo $uri_sub_paths[$i] . " matches route '" . $route_sub_paths[$i] . "'</br>";
                if($i == $uri_sub_paths_count - 1) {
                    die('Match found for ' . $route);
                }
            }
        }
    }
    echo 'No match with: ' . $route . "</br>";
}
die('Unknown route'. "</br>");

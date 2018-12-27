<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:49 PM
 */

require_once 'vendor/autoload.php';

use \App\Core\App;

session_start();

$app = new App('routes.php');

<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:49 PM
 */

require_once 'vendor/autoload.php';

use App\Core\{App, Database, Request, Response, Router};

session_start();

App::bind('database', new Database('core/config/.env'));

App::bind('req', $req = new Request());

App::bind('res', $res = new Response());

Router::load('routes.php')->direct($req->getMethod(), $req->getPath());

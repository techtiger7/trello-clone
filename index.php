<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:49 PM
 */

require_once 'core/models/Request.php';

Router::direct(Request::uri(), Request::method());

<?php
/**
 * Created by PhpStorm.
 * User: Tom Dickman
 * Date: 11/12/18
 * Time: 6:59 PM
 */

namespace App\Core\Controllers;

class PageController
{
    public function index()
    {
        require_once 'core/views/index.view.php';
    }

}
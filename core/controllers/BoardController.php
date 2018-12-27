<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 18/12/18
 * Time: 10:25 PM
 */

namespace App\Core\Controllers;

class BoardController
{
    public static function index()
    {
        require_once 'core/views/boards/index.view.php';
    }

    public function create()
    {
        require_once 'core/views/boards/create.view.php';
    }

    public function store()
    {
        require_once 'core/views/boards/store.view.php';
    }

    public function edit()
    {
        require_once 'core/views/boards/edit.view.php';
    }

    public function update()
    {
        require_once 'core/views/boards/update.view.php';
    }

    public function destroy()
    {
        require_once 'core/views/boards/destroy.view.php';
    }
}
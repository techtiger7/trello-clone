<?php
/**
 * Created by PhpStorm.
 * User: tom_d
 * Date: 18/12/18
 * Time: 10:25 PM
 */

namespace App\Core\Controllers;

use App\Core\App;

class BoardController
{

    private $database;

    public function __construct()
    {
        $this->database = App::get('database');
    }

    public function index()
    {
        $boards = $this->database->selectAll('boards');

        return require_once 'core/views/boards/index.view.php';
    }

    public function create()
    {
        require_once 'core/views/boards/create.view.php';
    }

    public function store()
    {
        $values = [
            'title' => $_POST['title'],
            'description' => $_POST['description']
        ];

        $this->database->store('boards', $values);

        $this->index();
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
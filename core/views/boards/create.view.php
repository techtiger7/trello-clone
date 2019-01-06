<?php
    $title = 'Create Board';
    require_once 'core/views/partials/header.php';
?>
<h1>Create Board</h1>
<form method="POST" action="/boards/create">
    <label for="title">Title</label>
    <input id="title" name="title" type="text" />
    <label for="description">Description</label>
    <input id="description" name="description" type="text" />
    <input type="submit" />
</form>

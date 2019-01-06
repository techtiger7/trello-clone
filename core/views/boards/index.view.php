<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boards</title>
</head>
<body>
    <h1>Boards</h1>
    <?php foreach ($boards as $board) : ?>
    <p>Title: <?= $board['title'] ?>, Description: <?= $board['description'] ?></p>
    <?php endforeach; ?>
</body>
</html>
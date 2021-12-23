<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css?t=<?php echo(microtime(true).rand()); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
    <title>Игровой форум</title>
</head>
<body>
<div class="wrapper">
    <?php 
    require_once('views/header.php');
    if ($position = strpos($_SERVER['REQUEST_URI'], '?')) {
        $file = 'views'. substr($_SERVER['REQUEST_URI'], 0, $position);
    } else {
        $file = 'views'. $_SERVER['REQUEST_URI'];
    }
    file_exists($file) && $file !== 'views/' && $file !== 'views/index.php'
        ? require_once($file)
        : require_once('views/themes-list.php');
    require_once('views/footer.php');
    ?>
</div>


</body>
</html>
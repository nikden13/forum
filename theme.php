<?php
session_start();

if (!isset($_GET['id'])) {
    echo 'Не найдено';
    exit();
}

$themeId = $_GET['id'];

$db = require_once('actions/db-connect.php');
$result = mysqli_query($db,
    "SELECT * FROM themes WHERE id={$themeId}");

while($row = mysqli_fetch_array($result)) {
    $theme = $row;
}

if (!isset($theme)) {
    echo 'Не найдено';
    exit();
}

$result = mysqli_query($db, "SELECT * FROM users WHERE id={$theme['user_id']}");

while($row = mysqli_fetch_array($result)) {
    $themeUser = $row;
}

$result = mysqli_query($db,
    "SELECT comments.*, users.login as userLogin 
           FROM comments INNER JOIN users ON users.id = comments.user_id
           WHERE theme_id={$theme['id']}
           ORDER BY comments.create_at DESC"
);

while($row = mysqli_fetch_array($result)) {
    $comments[] = $row;
}

require_once('views/index.php');


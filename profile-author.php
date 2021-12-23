<?php
session_start();

$db = require_once('actions/db-connect.php');
$result = mysqli_query($db,
    "SELECT * FROM users WHERE id={$_GET['id']}");

while($row = mysqli_fetch_assoc($result)) {
    $user = $row;
}

if (!isset($user)) {
    echo 'Не найдено.';
    exit();
}

require_once('views/index.php');

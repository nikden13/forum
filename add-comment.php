<?php
session_start();
require_once('actions/check-token.php');

$db = require_once('actions/db-connect.php');

if (empty($_POST['text']) || empty($_POST['theme_id'])) {
    echo 'Комментарий не может быть пустым.';
    exit();
}

$result = mysqli_query($db,
    "INSERT INTO comments (text, theme_id, user_id) VALUES ( '{$_POST['text']}','{$_POST['theme_id']}','{$_SESSION['id']}')"
);

if ($result) {
    setSession('Комментарий успешно создана.');
} else {
    setSession('Ошибка создания комментария.');
}

header("Location: theme.php?id={$_POST['theme_id']}");
mysqli_close($db);
exit();

function setSession($message)
{
    $_SESSION['message'] = $message;
}
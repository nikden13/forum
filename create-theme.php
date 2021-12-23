<?php
session_start();
require_once('actions/check-token.php');

$db = require_once('actions/db-connect.php');

if (empty($_POST['title'])) {
    echo 'Заголовок темы не может быть пустым.';
    exit();
}

if (!isset($_POST['description'])) {
    $_POST['description'] = '';
}

$result = mysqli_query($db,
    "INSERT INTO themes (title, description, user_id) VALUES ( '{$_POST['title']}','{$_POST['description']}','{$_SESSION['id']}')"
);

if ($result) {
    setSession('Тема успешно создана.');
} else {
    setSession('Ошибка создания темы.');
}

header('Location: index.php');
mysqli_close($db);
exit();

function setSession($message)
{
    $_SESSION['message'] = $message;
}
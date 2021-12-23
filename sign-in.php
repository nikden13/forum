<?php
session_start();

if (isset($_POST['login'])) {
    $db = require_once('actions/db-connect.php');

    if (isset($_SESSION['id'])) {
        $errors[] = 'Вход уже выполнен.';
    } else {
        $login = $_POST['login'];
        $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE login='$login'"));

        if ($user && isset($_POST['password']) && password_verify($_POST['password'], $user['password'])) {
            setSession($user['id'], $login);
            header('Location: index.php');
            mysqli_close($db);
            exit();
        } else {
            $errors[] = 'Неверное имя или пароль.';
            mysqli_close($db);
        }
    }
}

function setSession($userId, $login)
{
    $_SESSION['message'] = 'Вход выполнен.';
    $_SESSION['id'] = $userId;
    $_SESSION['login'] = $login;
}

require_once('views/index.php');
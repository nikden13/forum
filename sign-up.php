<?php
session_start();

if (isset($_POST['login'])) {
    if (isset($_SESSION['id'])) {
        $errors[] = 'Вы уже зарегистрированы.';
    } else {
        $login = trim($_POST['login']);

        if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
            $errors[] = 'Пароль должен содержать минимум 6 символов.';
        }

        if (isset($_POST['password']) && strlen($_POST['password']) > 32) {
            $errors[] = 'Максимальная длина пароля 32 символа.';
        }

        if (strlen($_POST['login']) > 32) {
            $errors[] = 'Максимальная длина имени 32 символа.';
        }

        if ($login === '') {
            $errors[] = 'Имя не может быть пустым.';
        } else if (!preg_match('/^[a-z0-9<>?@()#!%&]+$/i', $login)) {
            $errors[] = 'Имя может содержать только цифры, латинские символы и знаки <>?@()#!%&';
        }

        if (empty($errors)) {
            $db = require_once('actions/db-connect.php');

            $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE login='$login'"));

            if ($user) {
                $errors[] = 'Данное имя уже используется.';
                mysqli_close($db);
            } else {
                $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                $result = mysqli_query($db, "INSERT INTO users (login,password) VALUES('$login','$password')");

                if ($result) {
                    setSession('Вы успешно зарегистрировались.', mysqli_insert_id($db), $login);
                } else {
                    setSession('Ошибка регистрации.');
                }
                header('Location: index.php');
                mysqli_close($db);
                exit();
            }
        }
    }
}

function setSession($message, $userId = null, $login = null)
{
    $_SESSION['message'] = $message;
    if (isset($userId)) {
        $_SESSION['id'] = $userId;
        $_SESSION['login'] = $login;
    }
}

require_once('views/index.php');

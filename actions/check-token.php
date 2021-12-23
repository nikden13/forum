<?php

if (!isset($_SESSION['id'])) {
    echo 'Не авторизован.';
    exit();
}
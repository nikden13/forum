<?php
session_start();
require_once('actions/check-token.php');

$_SESSION = [];
header('Location: index.php');
exit();

<?php
session_start();

$perpage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] - 1 : 0;
if ($page < 0) {
    $page = 0;
}
$offset = $perpage * $page;

$db = require_once('actions/db-connect.php');
$result = mysqli_query($db,
    "SELECT themes.*, COUNT(comments.theme_id) as commentsCount
           FROM themes LEFT JOIN comments ON comments.theme_id = themes.id
           GROUP BY themes.id
           ORDER BY themes.create_at DESC");

while($row = mysqli_fetch_assoc($result)) {
    $themes[] = $row;
}

if (isset($themes)) {
    foreach ($themes as &$theme) {
        $theme['user_login'] = mysqli_fetch_row(mysqli_query($db,
                "SELECT login FROM users WHERE id='{$theme['user_id']}'")
        )[0];
    }
    $countThemes = count($themes);
    $themes = array_slice($themes, $perpage * $page, $perpage);
} else {
    $themes = [];
    $countThemes = 0;
}

require_once('views/index.php');


<?php

$salt = 'RANDMO1231KJKLJ';
session_start();

// наши сессионные переменные
// logged_user_id

include './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['logged_user_id'])) {
    $user_username = trim($_POST['username']);
    $user_password = trim(crypt($_POST['password'],$salt));

    if (!empty($user_username) && !empty($user_password)) {
        $query = $db->query("SELECT `user_id` , `username` FROM `users` WHERE username = " . $db->quote($user_username) . " AND password = (" . $db->quote($user_password) . ")");
        $user_data = $row = $query->fetch(PDO::FETCH_ASSOC);

        if (!empty($row)) {
            $_SESSION['logged_user_id'] = $row['user_id'];

            if ($_POST['remember_me']) {
                setcookie('username', $row['username'], time() + 60 * 60 * 24 * 30);
                setcookie('password', crypt($row['password'], $salt), time() + 60 * 60 * 24 * 30);
            }

            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header('Location: ' . $home_url);
        } else {
            echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
        }
    } else {
        echo 'Извините вы должны заполнить поля правильно';
    }
}

//check 'Remember me' user
//
if (!empty($_COOKIE['username']) && !empty($_COOKIE['password']) && empty($_SESSION['logged_user_id'])) {

    $user_username = trim($_COOKIE['username']);
    $user_password = trim($_COOKIE['password']);
    
    $query = $db->query("SELECT `user_id` , `username` FROM `users` WHERE username = " . $db->quote($user_username) . "");
    $user_data = $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($user_password == crypt($row['password'], $salt)) {
        $_SESSION['logged_user_id'] = $row['user_id'];
    }
}

if (!empty($_SESSION['logged_user_id'])) {
    $query = $db->query("SELECT * FROM `users` WHERE user_id = " . $db->quote($_SESSION['logged_user_id']) . "");
    $user_data = $query->fetch(PDO::FETCH_ASSOC);
}

<?php

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);

    if (empty($username) || empty($password1) || empty($password2)) {
        $_SESSION['message'] = 'Пожалуйста заполлните все поля';
    } elseif ( ($password1 != $password2)) {
        $_SESSION['message'] = 'Пароли не совпадают';
    } else {
        if (aut::getInstance()->signup($username, $password1)) {
            $_SESSION['message'] = 'Всё готово, можете авторизоваться';
            header('Location: /');
        } else {
            $_SESSION['message'] = 'Логин уже существует';
        }
    }
}
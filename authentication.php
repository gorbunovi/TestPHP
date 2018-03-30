<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['logged_user_id'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        if (empty($_POST['remember_me'])) {
            $_POST['remember_me'] = false;
        }
        
        if (aut::getInstance()->login($_POST['username'], $_POST['password'], $_POST['remember_me'])) {
            header('Location: /');
        } else {
            echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
        }
    } else {
        echo 'Извините вы должны заполнить поля правильно';
    }
}
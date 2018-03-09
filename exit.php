<?php
session_start();
unset($_SESSION['logged_user_id']);
unset($_COOKIE['password']);
unset($_COOKIE['username']);
setcookie('password', '', -1, '/');
setcookie('username', '', -1, '/');
header('Location: ' . '/index');
?>
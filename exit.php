<?php
session_start();
unset($_SESSION['logged_user_id']);
unset($_COOKIE['password']);
unset($_COOKIE['username']);
setcookie('password', '', -1, '/');
setcookie('username', '', -1, '/');
$home_url = 'http://' . $_SERVER['HTTP_HOST'];
 header('Location: ' . $home_url);
 
?>
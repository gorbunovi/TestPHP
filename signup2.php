<?php

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$salt = getenv('salt');

$salt = 'RANDMO1231KJKLJ';
session_start();
include './db.php';
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password1 = trim(crypt($_POST['password1'], $salt));
    $password2 = trim(crypt($_POST['password2'], $salt));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
        $data = ORM::for_table('users')->where('username', $username)->find_array();


//$query = $db->query("SELECT * FROM `users` WHERE username =" . $db->quote($username));
        //$data =$query->fetch(PDO::FETCH_ASSOC);
        if (empty($data)) {
            $person = ORM::for_table('users')->create();
            $person->username = $username;
            $person->password = $password2;
            $person->save();
            //$query = $db->query("INSERT INTO `users` (username, password) VALUES (" . $db->quote($username) . ", (" . $db->quote($password1) . "))");
            $_SESSION['mesage'] = 'Всё готово, можете авторизоваться';
            header('Location: ' . '/index');
            exit();
        } else {
            $_SESSION['mesage'] = 'Логин уже существует';
        }
    }
}
?>
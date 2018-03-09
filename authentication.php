<?php

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$salt = getenv('salt');



session_start();

// наши сессионные переменные
// logged_user_id

require_once './db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['logged_user_id'])) {
    $user_username = trim($_POST['username']);
    $user_password = trim(crypt($_POST['password'],$salt));

    if (!empty($user_username) && !empty($user_password)) {
      
       $person = ORM::for_table('users')->where('username', $user_username)->find_one();

        if (!empty($person)) {
            $_SESSION['logged_user_id'] = $person->user_id;
            

            if ($_POST['remember_me']) {
                setcookie('username', $person->username, time() + 60 * 60 * 24 * 30);
                setcookie('password', crypt($person->password, $salt), time() + 60 * 60 * 24 * 30);
            }

            header('Location: ' . '/index');
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
   
    $user_data = ORM::for_table('users')->where('username', $user_username)->find_array();
    $user_data=$user_data[0];
   
    


    //$query = $db->query("SELECT `user_id` , `username` FROM `users` WHERE username = " . $db->quote($user_username) . "");
    //$user_data = $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($user_password == crypt($user_data['password'], $salt)) {
        $_SESSION['logged_user_id'] = $user_data['user_id'];
    }
}

if (!empty($_SESSION['logged_user_id'])) {
    $user_data  = ORM::for_table('users')->where('user_id', $_SESSION['logged_user_id'])->find_array();
    $user_data=$user_data[0];
    

    //$query = $db->query("SELECT * FROM `users` WHERE user_id = " . $db->quote($_SESSION['logged_user_id']) . "");
    //$user_data = $query->fetch(PDO::FETCH_ASSOC);
}

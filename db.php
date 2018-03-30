<?php

$username = getenv('nameuser');
$connection_string = getenv('connection_string');
$password = getenv('password');
ORM::configure(array(
    'connection_string' => $connection_string,
    'username' => $username,
    'password' => $password
));
?>

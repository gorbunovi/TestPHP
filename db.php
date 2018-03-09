<?php
require_once './vendor/autoload.php';
ORM::configure(array(
    'connection_string' => 'mysql:host=localhost:3306;dbname=users',
    'username' => 'root',
    'password' => ''
));
?>

<?php

require 'vendor/autoload.php';

$klein = new \Klein\Klein();

require './aut.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$salt = getenv('salt');


session_start();

// наши сессионные переменные
// logged_user_id
require_once './db.php';

$aut = aut::getInstance();
$aut->setSalt($salt);

$aut->checkLoggedUser();

$klein->respond(['POST','GET'], '/', function ($request, $response, $service) {
    
    require './authentication.php';

    if (!empty($_SESSION['message'])) {
        $service->message = $_SESSION['message'];
        $_SESSION['message'] = '';
    }
    
    $service->user_data = aut::getInstance()->getUserData();

    $service->layout('./views/layout/layout.php');
    $service->render('./views/newIndex.php');
    
});

$klein->respond(['POST', 'GET'], '/signup', function ($request, $response, $service) {
    require './signup2.php';

    if (!empty($_SESSION['message'])) {
        $service->message = $_SESSION['message'];
        $_SESSION['message'] = '';
    }

    $service->layout('./views/layout/layout.php');
    $service->render('./views/signup.php');
});

$klein->respond(['POST', 'GET'], '/list1', function ($request, $response, $service) {
    require './authentication.php';
    
    if (!empty($_SESSION['message'])) {
        $service->message = $_SESSION['message'];
        $_SESSION['message'] = '';
    }

    $service->user_data = aut::getInstance()->getUserData();
    $service->layout('./views/layout/layout.php');
    $service->render('./views/list1.php');
});

$klein->respond(['POST', 'GET'], '/list2', function ($request, $response, $service) {
    require './authentication.php';
    
    if (!empty($_SESSION['message'])) {
        $service->message = $_SESSION['message'];
        $_SESSION['message'] = '';
    }

    $service->user_data = aut::getInstance()->getUserData();
    $service->layout('./views/layout/layout.php');
    $service->render('./views/list2.php');
});

$klein->respond(['POST', 'GET'], '/exit', function ($request, $response, $service) {
    aut::getInstance()->logout();
    header('Location: ' . '/');
    exit();
});

//$klein->respond(['POST', 'GET'], '*', function ($request, $response, $service) {
//    header('Location: ' . '/');
//    exit();
//});


$klein->dispatch();
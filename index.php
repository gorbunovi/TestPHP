<?php

require 'vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond(['POST','GET'], '/', function ($request, $response, $service) {
    require './authentication.php';
    $service->user_data = $user_data;
    $service->render('./newIndex.php');
    
});
$klein->respond(['POST', 'GET'], '/index', function ($request, $response, $service) {
    require './authentication.php';
    $service->user_data = $user_data;  
    $service->render('./newIndex.php');
});

$klein->respond(['POST', 'GET'], '/signup', function ($request, $response, $service) {
    require './signup2.php';
    $service->render('./signup.php');
});

$klein->respond(['POST', 'GET'], '/list1', function ($request, $response, $service) {
    require './authentication.php';
    $service->user_data = $user_data;
    $service->render('./list1.php');
});

$klein->respond(['POST', 'GET'], '/list2', function ($request, $response, $service) {
    require './authentication.php';
    $service->user_data = $user_data;
    $service->render('./list2.php');
});

$klein->dispatch();

$user_data = array();
?>
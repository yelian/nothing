<?php

include_once '../entity/User.php';
include_once '../service/UserService.php';

doService();

function doService()
{
    // var_dump($_POST);
    $userService = getUserService();  
    $user = new User();
    if (isset($_POST)) {
        $register = $_POST;
        $user->setName($register['name']);
        $user->setPassword($register['password']);
        $userService->insert($user);
        
    } else if (isset($_GET) && isset($_GET['name'])) {
        $name = $_GET("name");
        
    }
}

function register($param) {
    $user = new User();
    
}

function checkUserExist($param)
{}

function getUserService(){
    return UserService::getInstance();
}
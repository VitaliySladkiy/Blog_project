<?php
require_once "config.php";

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass."ghfds45");

    $result = $connection -> query("SELECT * FROM `register` WHERE `email` = '$email' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo ('Такой пользователь не найден');
        exit();
    }

    setcookie('username', $user['login'], time() + 3600, "index.php");
    setcookie('email', $user['email'], time() + 3600, "index.php");

    if('Location: ' . $_SERVER['REQUEST_URI'] = 'index.html/Blog_project/index.php'){
        header('Location: ' . $_SERVER['REQUEST_URI'] . '?r=1');}
<?php
require_once "config.php";

    $text = $_POST['text'];
    $email = $_COOKIE['login'];
    $id_article = $_GET['id'];

    if(!isset($_COOKIE['email']) || !$_COOKIE['email']){
        echo "Нужно войти в аккаунт!";
        exit();
    }

$connection -> query("INSERT INTO `comments` (`text`, `login`, `id_article`) VALUES ('$text','$login','$id_article')");
$connection -> close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

















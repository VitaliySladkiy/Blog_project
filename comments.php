<?php
require_once "config.php";

    $text = $_POST['text'];
    $email = $_COOKIE['email'];
    $id_article = $_GET['id'];

    if(!isset($_COOKIE['email']) || !$_COOKIE['email']){
        echo "Нужно войти в аккаунт!";
        exit();
    }

$connection -> query("INSERT INTO `comments` (`text`, `email`, `id_article`) VALUES ('$text','$email','$id_article')");
$connection -> close();

header('Location: article.php');

















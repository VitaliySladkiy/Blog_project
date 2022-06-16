<?php
require_once "config.php";

    $get_user_id= mysqli_query($connection,"SELECT user_id FROM comments JOIN register ON comments.user_id = register.id WHERE register.login = ". $_COOKIE['username']);
    $id = mysqli_fetch_array($get_user_id);
    $user_id = $id['user_id'];
    $text = $_POST['comment_text'];
    $id_article = $_POST['id_article'];

$connection -> query("INSERT INTO `comments` (`text`, `user_id`, `id_article`) VALUES ('$text','$user_id','$id_article')");
$connection -> close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

















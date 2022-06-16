<?php

setcookie('username', $user['login'], time() - 3600, "index.php");
setcookie('email', $user['email'], time() - 3600, "index.php");

    header('Location: ' . $_SERVER['HTTP_REFERER']);
<?php

setcookie('username', $user['login'], time() - 3600, "index.php");

header('Location: index.php');
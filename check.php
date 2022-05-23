<?php
    require_once "config.php";

   $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
   $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
   $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
   $repass = filter_var(trim($_POST['repass']), FILTER_SANITIZE_STRING);
   if (mb_strlen($login) < 5 || mb_strlen($login) > 20){
       echo "Недопустимая длинна логина";
       exit();
   }elseif (mb_strlen($email) < 5 || mb_strlen($email) > 22) {
       echo "Недопустимая длинна email";
       exit();
   }elseif (mb_strlen($pass) < 5 || mb_strlen($pass) > 20) {
       echo "Недопустимая длинна password";
       exit();
   }elseif (mb_strlen($repass) != mb_strlen($pass)) {
       echo "Неверный repass";
       exit();
   }else{
       echo $login, $email, $pass, $repass;
   }

   $pass = md5($pass."ghfds45");
   $repass = md5($repass."ghfds45");

    $connection -> query("INSERT INTO `register` (`login`, `email`, `pass`) VALUES ('$login','$email','$pass')");
    $connection -> close();

    header('Location: index.php');














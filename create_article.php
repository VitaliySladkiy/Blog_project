<?php
require_once "config.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style_articles.css">
    <link href="css/all.css" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chilanka&family=Roboto:wght@400;500;700&display=swap');
    </style>

</head>
<body>
<?php
require_once "navbar.php";
?>

<form action="">
    <div class="container">
        <h1>Создай свою статью</h1>
        <p>Заполнение всех строк является обязательным.</p>
        <hr>

        <label for="username"><b>Автор</b></label>
        <input type="text" placeholder="Ваше имя..." name="author" id="author" required>

        <label for="title"><b>Название статьи</b></label>
        <input type="text" placeholder="Ваше название..." name="title" id="title" required>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">With textarea</span>
            </div>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <label for="image"><b>Картинка</b></label>
        <input type="file" placeholder="Текст..." accept="image" name="text_articles" id="text_articles" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
    </div>
</form>
<?php
require_once "footer.html";
?>
</body>
</html>

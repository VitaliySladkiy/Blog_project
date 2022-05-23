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
    <meta http-equiv="X-UA-Compatible" content="ie=edge" >
    <title>Article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chilanka&family=Roboto:wght@400;500;700&display=swap');
    </style>

</head>
<body>
<?php
require_once "navbar.php";
?>

<section class="container">
    <div class="post-content">
            <div>
                <?php
                $article= mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = ".$_GET['id']);
                if(mysqli_num_rows($article) <= 0)
                {
                    ?>
                    <div id="content">
                        <div class="container">
                            <div class="row">
                                <section class="content__left col-md-8">
                                    <div class="block">
                                        <h3>Статья не найдена!</h3>
                                        <div class="block__content">
                                            <div class="full-text">
                                                Запрашиваемая вами статья не существует
                                            </div>
                                        </div>
                                </section>
                        </div>
                    </div>
                    <?php
                }   else
                {
                $art = mysqli_fetch_assoc($article);
                ?>
                    <div class='article-content' data-aos='zoom-in'>
                        <div class='post-info flex-row'>
                            <span><i class='fas fa-user text-grey'></i>&nbsp;&nbsp;<?php echo $art['author']; ?></span>
                            <span><i class='fas fa-calendar-alt text-grey'></i>&nbsp;&nbsp;<?php echo $art['pubdate']; ?></span>
                        </div>
                        <div class='post-image'>
                            <div>
                                <img src='./assets/Blog-post/<?php echo $art['image']; ?>' class='img' alt='blog1'>
                            <h2><?php echo $art['title']; ?></h2>
                            <p><?php echo $art['text_articles']; ?></p>
                            </div>
                        </div>
                        <div class='post-title'>
                        </div>
                    </div>
                <?php
                }?>
                    </div>
                <?php
                $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `id_article` = " . $art['id']);
                if(mysqli_num_rows($comments) <= 0)
                {
                ?>
                <div id="content">
                    <div class="container">
                        <div class="row">
                            <section class="content__left col-md-8">
                                <div class="block">
                                    <h3>Комментариев пока нет...</h3>
                                    <div class="block__content">
                                        <div class="full-text">
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </div>
                <?php
                } else
                {
                $comm = mysqli_fetch_assoc($comments);
                ?>
                    <div class="container">
                        <div class="background"></div>
                        <div class="comments-content">
                            <h2>Comments</h2>
                            <div class="comment-pubdate">Комментарий оставлен <?php echo $comm['pubdate']; ?></div>
                            <div class="comment-email">Автор <?php echo $comm['email']; ?></div>
                            <div class="comment-text"><?php echo $comm['text']; ?></div>
                        </div>
                    </div>
                <?php
                }
                ?>

</section>
<?php
require_once "footer.html";
?>

<script src="js/main.js"></script>
</body>
</html>
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
                <?php

                if (isset($_GET['id'])) {
                    $page = (int)$_GET['id'];
                }
                $total_count_q = mysqli_query($connection, "SELECT COUNT(id) AS `total_count` FROM `articles`");
                $total_count = mysqli_fetch_assoc($total_count_q);
                $total_count = $total_count['total_count'];

                $sql_article_info = "SELECT * FROM articles
                                     JOIN register ON register.id = articles.user_id
                                     WHERE articles.id = ".$_GET['id'];
                $article= mysqli_query($connection, $sql_article_info);
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
                            <span><i class='fas fa-user text-grey'></i>&nbsp;&nbsp;<?php echo $art['login']; ?></span>
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
                <?php
                }?>
                    </div>
            <div class="comments-container">
                <?php
                $comments = mysqli_query($connection, "SELECT * FROM comments JOIN register ON comments.user_id = register.id WHERE comments.id_article =" .  $_GET['id'] . " ORDER BY pubdate desc");
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
                ?>
                    <div class='container'>
                        <div class='background'></div>
                            <h2>Comments</h2>
                            <?php
                                while ($comm = mysqli_fetch_assoc($comments)){?>
                                    <div class='comments-content'>
                                        <div class='comment-pubdate'>Комментарий оставлен <?php echo $comm['pubdate']; ?></div>
                                        <div class='comment-email'>Автор <?php echo $comm['login']; ?></div>
                                        <div class='comment-text'><?php echo $comm['text']; ?></div>
                                    </div>
                            <?php
                                }}
                            ?>
                    </div>
                    <div class="add-comment">
                        <h2>Add your comment</h2>
                        <form method="POST" action="comments.php" role="form" class="comment-form">
                            <label>
                                 <input type="hidden" value="<?=$_GET['id'];?>" name = 'id_article'">
                                <textarea name="comment_text" class="comment-textarea" placeholder="your comment..."></textarea>
                            </label>
                            <button class="comment-btn" type="submit" >Add comment</button>
                        </form>
                    </div>
                </div>
                <div class="paginator">
                <?php
                if ($page > 1) {
                    echo '<a href="/index.html/Blog_project/article.php?id=' . ($page - 1) . '"><h3>&laquo;Предыдущая страница</h3></a>';
                }
                if ($page < $total_count) {
                    echo '<a href="/index.html/Blog_project/article.php?id=' . ($page + 1) . '"><h3>Следующая страница&raquo;</h3></a>';
                }
                ?>
                </div>
    </div>

</section>
<?php
require_once "footer.html";
?>

<!------------------- Jquery Library file --------------------->
<script src="js/Jquery3.4.1.min.js"></script>


<script src="js/article.js"></script>
</body>
</html>
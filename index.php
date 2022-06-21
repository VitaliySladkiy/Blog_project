<?php
require_once "config.php";
require_once "nytimesapi.php";
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/all.css" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title'] ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chilanka&family=Roboto:wght@400;500;700&display=swap');
    </style>
    <!------------------- Owl-Carousel --------------------->

    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-----x------------- Owl-Carousel -----------------x--->

    <!--------------------AOS Carousel---------------------->
    <link rel="stylesheet" href="./css/aos.css">

</head>

<body>
<?php require_once "./navbar.php" ?>
<!-----------------Main Site Section------------------->

<main>

    <!-----------------Site Title------------------->

    <section class="site-title" id="site-title">
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
            <h3>Tools & Travels</h3>
            <h1>Amazing Place on Earth</h1>
            <button class="btn">Explore</button>
        </div>
    </section>

    <!--------x--------Site Title--------x---------->

    <!------------------- Blog Carousel --------------------->

    <section>
        <div class="blog">
            <div class="container">
                <div class="owl-carousel owl-theme blog-post">
                    <?php
                    for($i = 0; $i < 13; $i++ ){
                        echo "
                            <div class='blog-content' data-aos='zoom-in' data-aos-delay='100'>
                                <img src='" . $response['results'][$i]['media'][0]["media-metadata"][2]['url'] . "' alt='post-1'>
                                <div class='blog-title'>
                                    <h3>" . $response['results'][$i]['title'] . "</h3>
                                    <a class='btn btn-blog' target='_blank' href='" . $response['results'][$i]['url'] . "'>Fashion</a>
                                </div>
                            </div>
                        ";
                    }
                    ?>
                </div>
                <div class="owl-navigation">
                    <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                    <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                </div>
            </div>
        </div>
    </section>


    <!-----x------------- Blog Carousel ----------------x---->

    <!---------------------Site Content------------------------->
    <section class="container">
        <div class="site-content">
            <div class="posts">
                <span id="one" class="first active">
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` where `id` < 4");
                    while ($art = mysqli_fetch_array($articles))
                    {
                        ?>
                            <div class='post-content' data-aos='zoom-in'>
                                <div class='post-image'>
                                    <div>
                                        <img src='./assets/Blog-post/<?php echo $art['image'] ?>' class='img' alt='blog1'>
                                    </div>
                                    <div class='post-info flex-row'>
                                        <span><i class='fas fa-user text-grey'></i>&nbsp;&nbsp;<?php echo $art['author'] ?></span>
                                        <span><i class='fas fa-calendar-alt text-grey'></i>&nbsp;&nbsp;<?php echo $art['pubdate'] ?></span>
                                    </div>
                                </div>
                                <div class='post-title'>
                                    <h2><?php echo $art['title'] ?></h2>
                                    <p><?php echo $art['text_articles'] ?></p>
                                    <a class="post-btn" href="./article.php?id=<?php echo $art['id']?>">Read more &nbsp; <i class='fas fa-arrow-right'></i></a>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                <hr>
                </span>
                <span id="two" class="second">
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` where `id` < 7 and `id` > 3 ");
                    while ($art = mysqli_fetch_array($articles)) {
                        ?>
                        <div class='post-content' data-aos='zoom-in'>
                                <div class='post-image'>
                                    <div>
                                        <img src='./assets/Blog-post/<?php echo $art['image'] ?>' class='img' alt='blog1'>
                                    </div>
                                    <div class='post-info flex-row'>
                                        <span><i class='fas fa-user text-grey'></i>&nbsp;&nbsp;<?php echo $art['author'] ?></span>
                                        <span><i class='fas fa-calendar-alt text-grey'></i>&nbsp;&nbsp;<?php echo $art['pubdate'] ?></span>
                                    </div>
                                </div>
                                <div class='post-title'>
                                    <h2><?php echo $art['title'] ?></h2>
                                    <p><?php echo $art['text_articles'] ?></p>
                                    <a class="post-btn" href="./article.php?id=<?php echo $art['id']?>" target="_blank">Read more &nbsp; <i class='fas fa-arrow-right'></i></a>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                <hr>
                </span>
                <span id="three" class="third"></span>
                <div class="pagination flex-row">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                    <a class="page active" id="first">1</a>
                    <a class="page" id="second">2</a>
                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <aside class="sidebar">
                <div class="category">
                    <h1>Category</h1>
                    <ul class="category-list">
                        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                            <a href="#">Software</a>
                            <span>(05)</span>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                            <a href="#">Technology</a>
                            <span>(02)</span>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                            <a href="#">Lifestyle</a>
                            <span>(07)</span>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                            <a href="#">Shopping</a>
                            <span>(01)</span>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                            <a href="#">Food</a>
                            <span>(08)</span>
                        </li>
                    </ul>
                </div>
                <div class="popular-post">
                    <h2>Popular Posts</h2>
                    <?php
                    $popular_posts = mysqli_query($connection, "SELECT * FROM `popular_posts`");
                    while ($pop = mysqli_fetch_array($popular_posts)) {
                        echo "
                    <div class='post-content' data-aos='flip-up' data-aos-delay='200'>
                        <div class='post-image'>
                            <div>
                                <img src='./assets/popular-post/" . $pop['image'] . "' class='img' alt='blog1'>
                            </div>
                            <div class='post-info flex-row'>
                                <span><i class='fas fa-calendar-alt text-grey'></i>&nbsp;&nbsp;" . $pop['pubdate'] . "</span>
                            </div>
                        </div>
                        <div class='post-title'>
                            <a href='#'>" . $pop['title'] . "</a>
                        </div>
                    </div>
                        ";
                    }
                    ?>
                </div>
                <div class="newsletter">
                    <h2>Newsletter</h2>
                    <div class="font-element">
                        <input type="text" class="input-element" placeholder="Email">
                        <button class="btn form-btn">Subscribe</button>
                    </div>
                </div>
                <div class="popular-tags">
                    <h2>Popular Tags</h2>
                    <div class="tags flex-row">
                        <span class="tag" data-aos="flip-down" data-aos-delay="100">Software</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="200">Technology</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="300">Travel</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="400">Illustration</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="500">Design</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="600">Lifestyle</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="700">Love</span>
                        <span class="tag" data-aos="flip-down" data-aos-delay="800">Project</span>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-----x---------------Site Content------------------x------>

</main>

<!-----X-----------Main Site Section--------------X---->

<?php require_once "./footer.html" ?>

<!------------------- Jquery Library file --------------------->
<script src="js/Jquery3.4.1.min.js"></script>

<!------------------- Owl-Carousel --------------------->
<script src="js/owl.carousel.min.js"></script>

<!--------------------AOS Carousel---------------------->
<script src="./js/aos.js"></script>

<script src="js/main.js"></script>
</body>
</html>
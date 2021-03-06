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

<?php
require_once "./navbar.php";
 $sql_articles_category = "SELECT category , COUNT(category) as count_category
                                                        FROM articles_category
                                                        JOIN articles 
                                                        ON articles_category.id = articles.category_id
                                                        GROUP by category
                                                        ORDER BY count_category desc";
?>
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
                <h1 data-aos='zoom-in' data-aos-delay='100'>Articles you might like</h1>
                <div class="owl-carousel owl-theme blog-post">
                    <?php
                    for($i = 0; $i < 13; $i++ ){
                    if(!is_null($response['results'][$i]['media'][0]['media-metadata'][2]['url'])){
                        echo "
                            <div class='blog-content' data-aos='zoom-in' data-aos-delay='100'>
                                <img src='" . $response['results'][$i]['media'][0]['media-metadata'][2]['url'] . "' alt='post-1'>
                                <div class='blog-title'>
                                    <h3>" . $response['results'][$i]['title'] . "</h3>
                                    <a class='btn btn-blog' target='_blank' href='" . $response['results'][$i]['url'] . "'>Fashion</a>
                                </div>
                            </div>
                        ";
                    }else continue;}
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
                <span>
                    <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $size_page = 3;
                    $offset = ($pageno-1) * $size_page;
                    $count_sql = "SELECT COUNT(*) FROM `articles`";
                    $result = mysqli_query($connection, $count_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $size_page);
                    $sql_articles = "SELECT register.login, articles.*, articles_category.category FROM `register`
                                     JOIN `articles` ON articles.user_id = register.id
                                     JOIN articles_category on articles.category_id = articles_category.id LIMIT $offset, $size_page";
                    if (isset($_GET['category'])){
                        $sql_articles = "SELECT register.login, articles.*, articles_category.category FROM `register`
                                     JOIN `articles` ON articles.user_id = register.id
                                     JOIN articles_category on articles.category_id = articles_category.id
                                     WHERE articles_category.category = '".$_GET['category']."' LIMIT $offset, $size_page";
                    };
                    $res_data = mysqli_query($connection, $sql_articles);
                    while($row = mysqli_fetch_array($res_data)){
                        ?>
                            <div class='post-content' data-aos='zoom-in'>
                                <div class='post-image'>
                                    <div>
                                        <img src='./assets/Blog-post/<?php echo $row['image'] ?>' class='img' alt='blog1'>
                                    </div>
                                    <div class='post-info flex-row'>
                                        <span><i class='fas fa-user text-grey'></i><?php echo $row['login'] ?></span>
                                        <span><i class='fas fa-calendar-alt text-grey'></i><?php echo $row['pubdate'] ?></span>
                                    </div>
                                </div>
                                <div class='post-title'>
                                    <h2><?php echo $row['title'] ?></h2>
                                    <p><?php echo $row['text_articles'] ?></p>
                                    <a class="post-btn" href="./article.php?id=<?php echo $row['id']?>">Read more<i class='fas fa-arrow-right'></i></a>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                <hr>
                </span>
                <ul class="pagination flex-row">
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="?pageno=1">First</a>
                    </li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="?pageno=<?php echo $total_pages; ?>">Last</a>
                    </li>
                </ul>
            </div>
            <aside class="sidebar">
                <div class='category'>
                    <h1>Category</h1>
                    <ul class='category-list'>
                        <?php
                        $articles_category = mysqli_query($connection, $sql_articles_category);
                        while ($art_cat = mysqli_fetch_array($articles_category)){
                            echo"
                        <li class='list-items' data-aos='fade-left' data-aos-delay='100'>
                            <a href='http://localhost:63342/index.html/Blog_project/index.php?category=" .$art_cat['category']. "'>" .$art_cat['category']. "</a>
                            <span>(". $art_cat['count_category'] .")</span>
                        </li>
                        ";}
                        ?>
                    </ul>
                </div>
                <div class="popular-post">
                    <h2>Popular Posts</h2>
                    <?php
                    for($i = 0; $i < 5; $i++){
                    if(!is_null($shared['results'][$i]['media'][0]['media-metadata'][2]['url'])){
                        echo "
                    <div class='post-content' data-aos='flip-up' data-aos-delay='200'>
                        <div class='post-image'>
                            <div>
                                <img src='" . $shared['results'][$i]['media'][0]['media-metadata'][2]['url'] . "' class='img' alt='blog1'>
                            </div>
                            <div class='post-info flex-row'>
                                <span><i class='fas fa-calendar-alt text-grey'>". $shared['results'][0]['published_date'] ."</i></span>
                            </div>
                        </div>
                        <div class='post-title'>
                            <a href='" . $shared['results'][$i]['url'] . "'>" . $shared['results'][$i]['title'] . "</a>
                        </div>
                    </div>
                        ";
                    }else continue;}
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
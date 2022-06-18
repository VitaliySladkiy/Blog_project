<?php
require_once "config.php";
?>

<!-----------------navbar------------------->

<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="nav-brand">
            <a href="./index.php" class="text-gray">Blooger</a>
        </div><?php
        if ($_SERVER['REQUEST_URI'] =="/index.html/Blog_project/index.php"){
            echo"
        <div>
            <ul class='nav-items'>
                <li class='nav-link scrollHome'>
                    <a href='#'>Home</a>
                </li>
                <li class='nav-link scrollCategory'>
                    <a href='#'>Category</a>
                </li>
                <li class='nav-link scrollPopularPosts'>
                    <a href='#'>Popular Posts</a>
                </li>
                <li class='nav-link scrollFooter'>
                    <a href='#'>Contact Us</a>
                </li>
            </ul>
        </div>
        ";}
         if(!isset($_COOKIE['username']) || !$_COOKIE['username']): ?>
            <div class='btn' id='registration-btn'>login in</div>
        <?php else: ?>
        <div class="logged" id="logged">
            <?php echo $_COOKIE['username']?>
            <a href="./exit.php">выйти</a>
        </div>
        <?php endif;?>
        <div class="social text-gray">
            <a target="_blank" href="https://gifer.com/ru/6hez"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</nav>

<div class="blur">
    <div id="background"></div>
    <div class="registration-container" id="registration-container">
        <div class="panel panel-primary">
            <div class="panel-body">
                <?php
                if($_COOKIE['login'] == ''):
                ?>
                <div class="col" id="reg">
                    <form method="POST" action="check.php" role="form">
                        <div class="form-group">
                            <h2>Create account</h2>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupName">Login</label>
                            <input name="login" id="signupName" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupEmail">Email</label>
                            <input name="email" id="signupEmail" type="email" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <input name="pass" id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupPasswordagain">Password again</label>
                            <input name="repass" id="signupPasswordagain" type="password" maxlength="25" class="form-control">
                        </div>
                        <div class="form-group">
                            <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
                        </div>
                        <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                    </form>
                </div>
                <div class="col active" id="auth">
                    <form method="POST" action="auth.php" role="form">
                        <div class="form-group">
                            <h2>Authorization</h2>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupEmail">Email</label>
                            <input name="email" id="signupEmail" type="email" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <input name="pass" id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters">
                        </div>
                        <div class="form-group">
                            <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Sign in</button>
                        </div>
                        <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                        <p>Don't have an account? <a id="changeReg" href="#" >Registration</a></p>
                    </form>
                </div>
            </div>
            <?php
            else:
                ?>
                <p>Привет, <?=$_COOKIE['login'] ?> . Чтобы выйти нажмите <a href="./exit.php">здесь</a>.</p>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
<!-----X------------navbar---------------X---->

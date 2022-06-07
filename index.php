<?php
// // Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['lessorlogin'] == true){
    header("location: profile.php");
    exit;
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['tenantlogin'] == true){
    header("location: listing.php");
    exit;
}
// // Include config file
include "signin-lessor.php";

//require functions.php file
require ('functions.php');


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bee House</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <header>
            <nav>
                <img src="images/logo.png" class="logo">
                <ul class="nav-links">
                    <!-- <li><a href="#" class="active">Home</a></li> -->
                </ul>
                <!-- <a href="#" class="show-login">Login</a> -->
                <div class="login-btn">
                    <?php
                        if(isset($_SESSION['lessorid'])){
                    ?>
                        <img src="images/user.png" width="30px" height="30px" alt="">
                        <div>
                            <h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
                            <small>Bee</small>
                        </div>
                    <?php
                        }else{
                    ?>
                        <button id="show-login">Sign In</button>
                    <?php
                        }
                    ?>
                </div>
            </nav>
        </header>
        <div class="popup">
            <div class="close-btn">&times;</div>
            <div class="tab-wrapper">
                <header>Sign In</header>
                <input type="radio" name="slider" checked id="lessor">
                <input type="radio" name="slider" id="tenant">

                <nav class = "tab-nav">
                    <label for="lessor" class="lessor"><i class="fas fa-home"></i>Lessor</label>
                    <label for="tenant" class="tenant"><i class="fas fa-blog"></i>Tenant</label>
                    <div class="slider"></div>
                </nav>

                <section>
                    <div class="content content-1">
                        <div class="form">
                            <h2>Lessor</h2>
                            <form action="include/signin-lessor-inc.php" method="post">
                                <div class="form-element">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                                    
                                </div>
                                <div class="form-element">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter password" class="form-control">
                                    
                                </div>
                                <div class="form-element">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember me</label>
                                </div>
                                <div class="form-element">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Login">
                                </div>
                                <div class="form-element">
                                    <a href="#">Forgot password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="content content-2">
                        <div class="form">
                            <h2>Tenant</h2>
                            <form action="include/signin-tenant-inc.php" method="post">
                                <div class="form-element">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                                </div>
                                <div class="form-element">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter password" class="form-control">
                                </div>
                                <div class="form-element">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember me</label>
                                </div>
                                <div class="form-element">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Login">
                                </div>
                                <div class="form-element">
                                    <a href="#">Forgot password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
               
            </div>

        </div>
        
        <main>
            <div class="header">
                <div class="container">
                    <h1>Looking for a Place to Stay?</h1>
                    <div class="search-bar">
                        <form action="listing.php">
                            <div class="location-input">
                                <label>Location</label>
                                <input type="text" placeholder="Where are you going?">
                            </div>
                            <button type="submit"><img src="images/search.png"></button>
                        </form>
                    </div>
                    <div class="bot">
                        <h2>Join us here</h2>
                        <a href="signup-category.php" class="signup-btn">Sign up</a>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer">
                <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>
                <a href="https://facebook.com/"><i class="fab fa-instagram-square"></i></a>
                <a href="https://facebook.com/"><i class="fab fa-youtube-square"></i></a>
                <a href="https://facebook.com/"><i class="fab fa-twitter-square"></i></a>
                <hr>
                <p>Copyright © 2021, Bee House</p>
            </div>
        </footer>
   
    </body>
</html>
<script src="javascript.js"></script>
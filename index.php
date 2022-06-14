<?php
// // Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['partnerlogin'] == true){
    header("location: listing.php");
    exit;
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['userlogin'] == true){
    header("location: listing.php");
    exit;
}

//require functions.php file
require ('functions.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bee House</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/icon.png">
        <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
        
    </head>
    <body style="background-image:  url(images/banner.png);">
        <?php if(isset($_SESSION['flash'])):
            if($_SESSION['flash'] == 'signupsuccess'){?>
        <div class="notif-popup">
            <i class="fas fa-check-circle"></i>
            <p>Congratulation, your account has been successfully created.</p>
            <button id="cont">Continue</button>
        </div>
        <?php unset($_SESSION['flash']); } endif; ?>

        <?php include_once ('template.include/header.php') ?>
        
        <?php include_once ('template.include/signin-popup.php') ?>
        
        <main>
            <div class="header">
                <div class="container">
                    <h1>Looking for a Place to Stay?</h1>
                    <div class="search-bar">
                        <form action="listing.php" method="post">
                            <div class="location-input">
                                <label>Location</label>
                                <input type="text" name="search-term" placeholder="Where are you going?">
                            </div>
                            <button type="submit" name="submit"><img src="images/search.png"></button>
                        </form>
                    </div>
                    <div class="bot">
                        <h2>Join us here</h2>
                        <a href="signup-category.php" class="signup-btn">Sign up</a>
                    </div>
                </div>
            </div>
        </main>

       
       
    </body>
</html>
<script src="javascript.js"></script>
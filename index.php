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
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#FCD12A">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Bee House">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bee House</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="notif.css">
        <link rel="icon" href="android-icon-36x36.png">
        <link rel="stylesheet" type="text/css" href="add_to_homescreen/style/addtohomescreen.css">
        <script src="add_to_homescreen/src/addtohomescreen.js"></script>
        <script>
            if(
                (("standalone" in window.navigator) && !window.navigator.standalone)
                ||
                (!window.matchMedia('(display-mode: standalone)').matches)
            ){
                addToHomescreen();
            }
        </script>
        <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
        
    </head>
    <body style="background-image:  url(images/banner.png);">
        <?php if(isset($_SESSION['flash'])):
            if($_SESSION['flash'] == 'signupsuccess'){?>
        <div class="notif-popup">
            <i class="fas fa-check-circle"></i>
            <p>Congratulation, your account has been successfully created.</p>
            <button class="notif-trigger">Continue</button>
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

    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script src="javascript.js"></script>
    <script src="notif.js"></script>
    </body>
</html>

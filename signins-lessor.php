<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee House</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img src="images/logo.png" class="logo"></a>
            <ul class="nav-links">
                
            </ul>
           
        </nav>
    </header>

    <main>
        <section class="account">
            <!-- <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active" data-title="Email"></div>
                <div class="progress-step" data-title="Details"></div>
                <div class="progress-step" data-title="Password"></div>
            </div> -->
            <form action="include/signin-lessor-inc.php" class="form" method="post">
                <div class="form-step form-step-active w3-animate-fading w3-animate-opacity">
                    <h1>Sign in to manage your property</h1>
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="btn-group2">
                        <button type="submit" name="submit" class="btn"><span>Sign in</span></button>
                    </div>
                    <hr class="line">
                    <p class="p-small">Questions about your property or the extranet? Check out Partner Help or Email Us.</p>
                    <div class="">
                        <a href="signup-lessor.php" class="btn btn-signin width-50 ml-auto"><span>Create your partner account</span></a>
                    </div>
                </div>
                <div class=foot>
                    <hr class="line">
                    <p class="p-small">By signing in or creating an account you agree with our Terms and Condiotions and Privacy Statement.</p>
                    <hr class="line">
                    <p class="p-small-nm">All rights reserved.</p>
                    <p class="p-small-nm">Copyright (2021-2022) - BeeHouse.com</p>
                </div>
            </form>
        </section>
    </main>

    <!-- <footer>
        <div class="footer">
            <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-instagram-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-youtube-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-twitter-square"></i></a>
            <hr>
            <p>Copyright © 2021, Bee House</p>
        </div>
    </footer> -->
   
<script src="multi-step.js"></script>
</body>
</html>

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
            <form action="include/signup-tenant-inc.php" class="form" method="post">
                <div class="form-step form-step-active w3-animate-fading w3-animate-opacity">
                    <h1>Create your tenant account</h1>
                    <p class="p-med">Create your account to list and manage your property</p>
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="">
                        <a href="#" class="btn btn-next width-50 ml-auto"><span>Continue</span></a>
                    </div>
                    <hr class="line">
                    <p class="p-small">Questions about your property or the extranet? Check out Partner Help or Email Us.</p>
                    <div class="">
                        <a href="signins-tenant.php" class="btn btn-signin width-50 ml-auto"><span>Sign In</span></a>
                    </div>
                </div>
                <div class="form-step w3-animate-right w3-animate-opacity">
                    <h1>Contact details</h1>
                    <p class="p-med">Your full name and phone number are needed to ensure the security of your Beehouse.com account.</p>
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="input-group">
                        <label for="firstName">First name</label>
                        <input type="text" name="firstName" id="firstName">
                    </div>
                    <div class="input-group">
                        <label for="lastName">Last name</label>
                        <input type="text" name="lastName" id="lastName">
                    </div>
                    <div class="input-group">
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                    <p class="p-small">We'll text a two-factor authentication code to this number when you sign in.</p>
                    <div class="btn-group">
                        <a href="#" class="btn btn-prev"><span>Back</span></a>
                        <a href="#" class="btn btn-next"><span>Continue</span></a>
                    </div>
                </div>
                <div class="form-step w3-animate-right">
                    <h1>Create password</h1>
                    <p class="p-med">Use a minimum of 10 characters, including uppercase letters, lowercase letters, and numbers.</p>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-group">
                        <label for="conPassword">Confirm password</label>
                        <input type="password" name="conPassword" id="conPassword">
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-prev"><span>Back</span></a>
                        <button type="submit" name="submit" class="btn"><span>Create account</span></button>
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
<script src="multi-step.js"></script>
</body>
</html>

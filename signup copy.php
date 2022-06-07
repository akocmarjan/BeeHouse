<?php
// Include config file
include('config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <nav>
        <a href="index.php"><img src="images/logo.png" class="logo"></a>
            
            <!-- <a href="#" class="show-login">Login</a> -->
            <div class="login-btn">
                <button id="show-login">Login</button>
            </div>
        </nav>
        
        <div class="wrapper">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form action="signup-upload.php" method="post">
                <div class="form-group">
                    <label>User Category</label>
                    <div class="select">
                        <select name="user_cat" id="user_cat">
                            <!-- <option selected disabled="">Choose unit type below</option> -->
                            <option value="0">Lessor</option>
                            <option value="1">Tenant</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstName">
                   
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastName">
                    
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" name="middleName">
                   
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="select">
                        <select name="gender" id="gender_cat">
                            <!-- <option selected disabled="">Choose unit type below</option> -->
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address">
                   
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email">
                </div>        
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="conPassword">
                </div>
                <div class="form-group">
                    <input name="submit" type="submit" class="btn btn-primary" value="Submit">
                </div>
                <p>Already have an account? <a href="index.php">Login here</a>.</p>
            </form>
        </div>
        <div class="footer">
            
            <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-instagram-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-youtube-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-twitter-square"></i></a>
            <hr>
            <p>Copyright © 2021, Bee House</p>
        </div>   
    </div>
    
</body>
</html>

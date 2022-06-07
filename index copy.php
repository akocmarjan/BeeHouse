<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }
// Include config file
require_once "config.php";
include "signin-tenant.php";
 
// Define variables and initialize with empty values
$login_username = $login_password = "";
$login_username_err = $login_password_err = $login_err ="";

//tenant login variables
$tenant_username = $tenant_firstname = $tenant_lastname = $tenant_middlename = $tenant_email = $tenant_password = $tenant_gender = $tenant_address ="";
$tenant_username_err = $tenant_firstname_err = $tenant_lastname_err = $tenant_middlename_err = $tenant_email_err = $tenant_password_err = $tenant_address_err ="";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $login_username_err = "Please enter username.";
    } else{
        $login_username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $login_password_err = "Please enter your password.";
    } else{
        $login_password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($login_username_err) && empty($login_password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $sql2 = "SELECT id, username, password FROM tenant WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_login_username);
            
            // Set parameters
            $param_login_username = $login_username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $login_username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($login_password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $login_username;
                            
                            // Redirect user to welcome page
                            header("location: profile.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
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
                            <?php 
                            if(!empty($login_err)){
                                echo '<div class="alert alert-danger">' . $login_err . '</div>';
                            }        
                            ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-element">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter username" class="form-control <?php echo (!empty($login_username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $login_username; ?>">
                                    <span class="invalid-feedback"><?php echo $login_username_err; ?></span>
                                </div>
                                <div class="form-element">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter password" class="form-control <?php echo (!empty($login_password_err)) ? 'is-invalid' : ''; ?>">
                                    <span class="invalid-feedback"><?php echo $login_password_err; ?></span>
                                </div>
                                <div class="form-element">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember me</label>
                                </div>
                                <div class="form-element">
                                    <input type="submit" class="btn btn-primary" value="Login">
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
                            <?php 
                            if(!empty($login_err)){
                                echo '<div class="alert alert-danger">' . $login_err . '</div>';
                            }        
                            ?>
                            <form action="signin-tenant.php" method="post">
                                <div class="form-element">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter username" class="form-control 
                                    <?php echo (!empty($login_username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $login_username; ?>">
                                    <span class="invalid-feedback"><?php echo $login_username_err; ?></span>
                                </div>
                                <div class="form-element">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter password" class="form-control <?php echo (!empty($login_password_err)) ? 'is-invalid' : ''; ?>">
                                    <span class="invalid-feedback"><?php echo $login_password_err; ?></span>
                                </div>
                                <div class="form-element">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember me</label>
                                </div>
                                <div class="form-element">
                                    <input type="submit" class="btn btn-primary" value="Login">
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


        <div class="header">
            <nav>
                <img src="images/logo.png" class="logo">
                <ul class="nav-links">
                    <li><a href="#" class="active">Home</a></li>
                </ul>
                <!-- <a href="#" class="show-login">Login</a> -->
                <div class="login-btn">
                    <button id="show-login">Sign In</button>
                </div>
            </nav>
            <div class="container">
                <h1>Looking for a Place to Stay?</h1>
                <div class="search-bar">
                    <form action="search.php">
                        <div class="location-input">
                            <label>Location</label>
                            <input type="text" placeholder="Where are you going?">
                        </div>
                        <button type="submit"><img src="images/search.png"></button>
                    </form>
                </div>
                <div class="bot">
                    <h2>Become a Lessor</h2>
                    <a href="signup.php" class="signup-btn">Sign Up Here</a>
                </div>
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
<script src="javascript.js"></script>
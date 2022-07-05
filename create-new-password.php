<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Forgot Password</title>
    <link rel="icon" href="android-icon-36x36.png">
    <link rel="stylesheet" href="style-admin.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body style="background-image:  url(images/banner.png);">
    <div class="wrapper">
        <section class="form login">
        <header>Create new password</header>
        <?php 
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];
            $username = $_GET["username"];

            if(empty($selector) || empty($validator)){
                echo "Could not validate your request!";
            }else{
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                ?>
                <p>Create a new password for <span> <?php echo $username ?> </span></p>
                <form action="include/reset-password-inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                    <div class="field input">
                    <input type="password" name="password" placeholder="Enter new password" required>
                    </div>
                    <div class="field input">
                    <input type="password" name="conpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="field button">
                    <?php if(isset($_GET["error"])){
                        if($_GET["error"] == "pwdnotmatch"){
                            echo '<p class="notif">Password not match!</p>';
                        }elseif($_GET["error"] == "empty"){
                            echo '<p class="notif">Input empty!</p>';
                        }
                    } ?>
                    <input type="submit" name="submit" value="Reset password">
                    </div>
                </form>
                
                <?php 
                }
            }
        ?>
        <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
        </section>
    </div>
</body>
</html>

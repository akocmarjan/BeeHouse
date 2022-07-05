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
        <header>Reset your password</header>
        <p>An e-mail will be send to you with instructions on how to reset your password.</p>
        <form action="include/forgot-password-inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
            <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <?php if(isset($_GET["error"])){
                if($_GET["error"] == "success"){
                    echo '<p class="notif">Check your e-mail!</p>';
                }elseif($_GET["error"] == "usernotfound"){
                    echo '<p class="notif">User not found!</p>';
                }
            } ?>
            <div class="field button">
            <input type="submit" name="submit" value="Reset password">
            </div>
           
        </form>
        <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
        </section>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="icon" href="android-icon-36x36.png">
    <link rel="stylesheet" href="style-admin.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body style="background-image:  url(images/banner.png);">
    <div class="wrapper">
        <section class="form login">
        <header>Admin Login Page</header>
        <form action="include/signin-admin-inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
            <input type="submit" name="submit" value="Continue">
            </div>
        </form>
        <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
        </section>
    </div>
</body>
</html>

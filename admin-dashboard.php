<?php
// Initialize the session
session_start();
// include('config.php');
require ('functions.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminlogin"]) || $_SESSION["adminlogin"] !== true){
    header("location: admin-index.php");
    exit;
}
$user = $table->getUsers();
$partner = $table->getLessor();
$property = $table->getPropertyCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="android-icon-36x36.png">
    <link rel="stylesheet" href="style-dashboard.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <input type="checkbox"  id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="listing.php"><h2><span class="fab fa-forumbee"></span><span>BeeHouse</span></h2></a>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin-dashboard.php" class="active"><span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="listing.php"><span class="fas fa-user-circle"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="logout.php"><span class="fas fa-sign-out-alt"></span>
                    <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper">
                <img src="images/user.png" width="30px" height="30px" alt="">
                <div>
                    <h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <main>
            <?php
                foreach($user as $users){}
                foreach($partner as $partners){}
                foreach($property as $properties){}
            ?>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $users['COUNT(id)']?></h1>
                        <span>User</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $partners['COUNT(id)']?></h1>
                        <span>Partner</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $properties['COUNT(id)']?></h1>
                        <span>Units</span>
                    </div>
                    <div>
                        <span class="fas fa-home"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1></h1>
                        <span>Traffic</span>
                    </div>
                    <div>
                        <span class="fas fa-google-wallet"></span>
                    </div>
                </div>
            </div>

           
        </div>
    </main>
</div>
</body>
</html>

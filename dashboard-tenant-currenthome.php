<?php
// Initialize the session
session_start();
// include('config.php');
require ('functions.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$lease = $table->getCurrentHome($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard - Tenants</title>
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
                    <a href="profile_tenant.php" ><span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><span class="fas fa-users"></span>
                    <span>Roommate</span></a>
                </li>
                <li>
                    <a href="dashboard-tenant-currenthome.php" class="active"><span class="fas fa-home"></span>
                    <span>Current Home</span></a>
                </li>
                <li>
                    <a href="dashboard-application.php"><span class="fas fa-file-alt"></span>
                    <span>Application</span></a>
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
                Current Home
                
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
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <?php foreach($lease as $leased){ 
                            $started_date = $leased['started_at'];
                            $due_date = date('Y-m-d', strtotime($started_date. '+ 1 months'));
                        ?>
                        <div class="card-header">
                            <h1><?php echo $leased['property_name'] ?></h1>
                            <button>See all <span class=""fas fa-arrow-right></span></button>
                        </div>
                        <div class="card-body">
                            <h3><?php echo "Room ".$leased['room_number'] ?></h3>
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Date started</td>
                                            <td>Due amount</td>
                                            <td>Due date</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td class="text-center"><?php echo $leased['started_at'] ?></td>
                                        <td class="text-center"><?php echo "P ".$leased['price'].".00" ?></td>
                                        <td class="text-center"><?php echo $due_date ?></td>
                                        <?php if($leased['tenant_status'] == 0): ?>
                                        <td class="text-center td-tena"><span class="badge badge-success"><span class="status orange"></span>Unpaid</span></td>
                                        <?php else: ?>
                                        <td class="text-center td-tena"><span class="badge badge-default"><span class="status green"></span>Paid</span></td>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

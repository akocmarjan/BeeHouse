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

$sum = $table->getSUM($_SESSION['partnerid']);
$sumincome = $table->getSUMIncome($_SESSION['partnerid']);
$count = $table->getCOUNT($_SESSION['partnerid']);
$countapp = $table->getCOUNTAPP($_SESSION['partnerid']);
$applicant = $table->getApplicants($_SESSION['partnerid']);
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
                    <a href="dashboard-partner-dashboard.php" class="active"><span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-tenants.php"><span class="fas fa-users"></span>
                    <span>Tenants</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-property.php"><span class="fas fa-home"></span>
                    <span>Property</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-rooms.php"><span class="fas fa-door-open"></span>
                    <span>Rooms</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-applicants.php"><span class="fas fa-file-alt"></span>
                    <span>Applicants</span></a>
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
           foreach($count as $counts){}
           foreach($sum as $sums){}
           foreach($sumincome as $sumincomes){}
            ?>
            <div class="cards">
                <div class="card-single">
                    <div>
                         <h1><?php echo $sums['SUM(tenants)']?></h1>
                        <span>Tenants</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $counts['COUNT(property.id)']?></h1>
                        <span>Units</span>
                    </div>
                    <div>
                        <span class="fas fa-home"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $countapp ?></h1>
                        <span>Applicants</span>
                    </div>
                    <div>
                        <span class="fas fa-file-alt"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo "P ".$sumincomes['sum(price)']?></h1>
                        <span>Estimated Income</span>
                    </div>
                    <div>
                        <span class="fas fa-google-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Applicants</h3>
                            <button>See all <span class=""fas fa-arrow-right></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Gender</td>
                                        <td>Unit name</td>
                                        <td>Room number</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                    <?php foreach($applicant as $applicants){ ?>
                                    <tbody>
                                        <td class="text-center td-db"><?php echo $applicants['first_name'] ?> <?php echo $applicants['last_name'] ?></td>
                                        <td class="text-center td-tena"><?php if($applicants['gender'] == 1){
                                            echo "Male";
                                        }else{
                                            echo "Female";
                                        } ?></td>
                                        <td class="text-center td-db"><?php echo $applicants['property_name'] ?></td>
                                        <td class="text-center td-db"><?php echo $applicants['room_number'] ?></td>
                                        <?php if($applicants['status'] == 0): ?>
                                        <td class="text-center td-db"><span class="badge badge-success"><span class="status orange"></span>Pending</span></td>
                                        <?php else: ?>
                                        <td class="text-center td-db"><span class="badge badge-default"><span class="status green"></span>Approved</span></td>
                                        <?php endif; ?>
                                        <td><?php  ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card-header">
                        <h3>New Tenants</h3>
                        <button>See all <span class=""fas fa-arrow-right></span></button>
                    </div>
                <div class="card-body">
                    <!-- <div class="customer">
                        <div class="info">
                            <img src="images/user.png" width="40px" height="40px" alt="">
                            <div>
                                <h4>Carl S. Andrei</h4>
                                <small>Student</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-comment"></span>
                            <span class="fas fa-phone"></span>
                        </div>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>

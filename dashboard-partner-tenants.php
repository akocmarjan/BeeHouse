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

// $sum = $table->getSUM($_SESSION['userid']);

$count = $table->getCOUNT($_SESSION['partnerid']);
$applicant = $table->getApplicants($_SESSION['partnerid']);
$property = $table->getProperty($_SESSION['partnerid']);


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
                    <a href="dashboard-partner-dashboard.php" ><span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-tenants.php" class="active"><span class="fas fa-users"></span>
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
                Tenants
                
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
            <div class="units-grid">
                <div class="units-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h1>Tenants</h1>
                            <button>See all <span class=""fas fa-arrow-right></span></button>
                        </div>
                        <?php foreach($property as $properties){?>
                        <h2><?php echo $properties['property_name'] ?></h2>
                        <?php  
                        $room = $table->getRoom($properties['property_id']);
                        foreach($room as $rooms){?>
                        <h3><?php echo "Room ".$rooms['room_number'] ?></h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Gender</td>
                                            <td>Date started</td>
                                            <td>Due amount</td>
                                            <td>Due date</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    $tenant = $table->getTenant($rooms['id']);
                                    foreach($tenant as $tenants){
                                        $started_date = $tenants['started_at'];
                                        $due_date = date('Y-m-d', strtotime($started_date. '+ 1 months')); 
                                    ?>
                                    <tbody>
                                        <td class="text-center td-tena"><?php echo $tenants['first_name']." ".$tenants['last_name'] ?></td>
                                        <td class="text-center td-tena"><?php if($tenants['gender'] == 1){
                                            echo "Male";
                                        }else{
                                            echo "Female";
                                        } ?></td>
                                        <td class="text-center td-tena"><?php echo $tenants['started_at'] ?></td>
                                        <td class="text-center td-tena"><?php echo $tenants['price'] ?></td>
                                        <td class="text-center td-tena"><?php echo $due_date ?></td>
                                        <?php if($tenants['status'] == 0): ?>
                                        <td class="text-center td-tena"><span class="badge badge-success"><span class="status orange"></span>Unpaid</span></td>
                                        <?php else: ?>
                                        <td class="text-center td-tena"><span class="badge badge-default"><span class="status green"></span>Paid</span></td>
                                        <?php endif; ?>
                                        <td class="text-center td-tena">
                                            <button class="action button-approve" type="button">Edit</button>
                                            <button class="cd-popup-trigger action button-cancel del-tenant" data-tenant_id="<?php echo $tenants['tenant_id'] ?>" data-tenant_room_id="<?php echo $rooms['id'] ?>" type="button">Delete</button>
                                        </td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <form class="popup-del" action="include/delete-tenant-inc.php" method="post">
                            <div class="cd-popup" role="alert">
                                <div class="cd-popup-container">
                                    <p>Are you sure you want to remove this tenant?</p>
                                    <ul class="cd-buttons" style="list-style: none;">
                                        <input type="hidden" name="del_tenant_id" id="del_tenant_id">
                                        <input type="hidden" name="del_room_id" id="del_room_id">
                                        <li><input name="submit" type="submit" class="cd-button-yes" value="Yes"></input></li>
                                        <li><input type="button" class="cd-button-no" value="No"></input></li>
                                    </ul>
                                    <a href="#0" class="cd-popup-close img-replace">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script src="popup.js"></script>
</body>
</html>

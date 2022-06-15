<?php
session_start();
include('functions.php');

$application = $table->getApplication($_SESSION['userid']);
print_r($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Application</title>
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
                    <a href="dashboard-tenant-currenthome.php"><span class="fas fa-home"></span>
                    <span>Current Home</span></a>
                </li>
                <li>
                    <a href="dashboard-application.php" class="active"><span class="fas fa-file-alt"></span>
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
                Application
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
                        <div class="card-header">
                            <h3>Applications</h3>
                            <button>See all <span class=""fas fa-arrow-right></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Property name</td>
                                            <td>Address</td>
                                            <td>Room Number</td>
                                            <td>Price</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                        <?php foreach($application as $applications){ ?>
                                        <tbody>
                                            <td class="text-center td-app"><?php echo $applications['property_name'] ?></td>
                                            <td class="text-center td-app"><?php echo $applications['barangay'].", ".$applications['city'] ?></td>
                                            <td class="text-center td-app"><?php echo $applications['room_number'] ?></td>
                                            <td class="text-center td-app"><?php echo $applications['price'] ?></td>
                                            <?php if($applications['status'] == 0): ?>
                                            <td class="text-center td-app"><span class="badge badge-success"><span class="status orange"></span>Pending</span></td>
                                            <?php else: ?>
                                            <td class="text-center td-app"><span class="badge badge-default"><span class="status green"></span>Approved</span></td>
                                            <?php endif; ?>
                                            <td class="text-center td-app">
                                                <button class="cd-popup-trigger action button-cancel" type="button">Cancel</button>
                                            </td>
                                            <td><?php  ?></td>
                                        </tbody>
                                        <form action="include/delete-application-inc.php" method="post">
                                            <div class="cd-popup" role="alert">
                                                <div class="cd-popup-container">
                                                    <p>Are you sure you want cancel?</p>
                                                    <ul class="cd-buttons" style="list-style: none;">
                                                        <input type="hidden" name="application_id" value=<?php echo $applications['id'] ?>>
                                                        <li><input name="submit" type="submit" class="cd-button-yes" value="Yes"></input></li>
                                                        <li><input type="button" class="cd-button-no" value="No"></input></li>
                                                    </ul>
                                                    <a href="#0" class="cd-popup-close img-replace">Close</a>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="popup.js"></script>
</body>
</html>

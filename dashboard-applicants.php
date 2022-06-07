<?php
session_start();
include('functions.php');

$applicant = $table->getApplicants($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                    <a href="profile.php" ><span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-users"></span>
                    <span>Tenants</span></a>
                </li>
                <li>
                    <a href="units.php" class=""><span class="fas fa-home"></span>
                    <span>Units</span></a>
                </li>
                <li>
                    <a href="rooms.php"><span class="fas fa-door-open"></span>
                    <span>Rooms</span></a>
                </li>
                <li>
                    <a href="dashboard-applicants.php" class="active"><span class="fas fa-file-alt"></span>
                    <span>Applicants</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-user-circle"></span>
                    <span>Accounts</span></a>
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
                                            <td>Name</td>
                                            <td>Gender</td>
                                            <td>Unit name</td>
                                            <td>Room number</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                        <?php foreach($applicant as $applicants){ ?>
                                        <tbody>
                                            <td><?php echo $applicants['first_name'] ?> <?php echo $applicants['last_name'] ?></td>
                                            <td></td>
                                            <td><?php echo $applicants['name'] ?></td>
                                            <td><?php echo $applicants['room_number'] ?></td>
                                            <?php if($applicants['status'] == 0): ?>
                                            <td class="text-center"><span class="badge badge-success"><span class="status orange"></span>Pending</span></td>
                                            <?php else: ?>
                                            <td class="text-center"><span class="badge badge-default"><span class="status green"></span>Approved</span></td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <button class="delete_cat" type="button">Approve</button>
                                                <button class="delete_cat" type="button">Cancel</button>
                                            </td>
                                            <td><?php  ?></td>
                                        <!-- <tr>
                                            <td>Marjan B. Carullo</td>
                                            <td>Male</td>
                                            <td>22</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr> -->
                                        </tbody>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

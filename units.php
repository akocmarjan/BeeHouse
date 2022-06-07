<?php
// Initialize the session
session_start();
include('config.php');
include('functions.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$unit = $table->getUnits($_SESSION['userid']);
$category = $table->getCategory();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style-dashboard.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
    

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    
    <!-- <script type="text/javascript">
        $(document).ready(function(){

            $("#select_cat").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

            });
    </script> -->
    

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
                    <a href="units.php" class="active"><span class="fas fa-home"></span>
                    <span>Units</span></a>
                </li>
                <li>
                    <a href="rooms.php" class=""><span class="fas fa-door-open"></span>
                    <span>Rooms</span></a>
                </li>
                <li>
                    <a href="dashboard-applicants.php"><span class="fas fa-file-alt"></span>
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

                Units
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

                
                <!-- Add Unit -->
                <div class="units-wrapper">
                    <form action="include/add-units-inc.php" id="postForm" method="post" enctype="multipart/form-data">
                        <!-- <div class="container"> -->
                            <h2>Add Units</h2>
                            <div class="form-group">
                                <label>Unit Name</label>
                                <input type="text" name="unitName" id="unit_name">
                            </div>
                            <div class="form-group">
                                <label>Category Type</label>
                                <div class="select">
                                    <select name="categoryID" id="select_cat">
                                        <option selected disabled="">Choose unit type below</option>
                                        <?php
                                        foreach($category as $cat){
                                            echo "<option value='".$cat['id']."' >".$cat['category_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                            <div class="form-group">
                                <label>Available for</label>
                                <div class="select">
                                    <select name="availableFor" id="select_cat">
                                    <option selected disabled="">Choose below</option>
                                        <option value=0>Female</option>
                                        <option value=1>Male</option>
                                        <option value=2>Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="submit" type="submit" class="btn btn-primary" value="Add Units"></input>
                            </div>
                            
                        <!-- </div> -->
                    </form>
                </div>
                <!-- Add Unit -->
                
                <!-- Added Units Table -->
                <div class="units-wrapper">
                    <div class="units">
                        <div class="card">
                            <div class="card-header">
                                <h3>Added Units</h3>
                                <button>See all <span class=""fas fa-arrow-right></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Unit Name</td>
                                                <td>Category Type</td>
                                                <td>Address</td>
                                                <td>Tenants</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch category
                                            foreach($unit as $units){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $units['name']?></td>
                                                <td class="text-center"><?php echo $units['category_name']?></td>
                                                <td class="text-center"><?php echo $units['address']?></td>
                                                <td class="text-center"><?php?></td>
                                                <td class="text-center">
                                                    <button class="edit_room" type="button">Edit</button>
                                                    <button class="delete_cat" type="button">Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Added Units Table -->


            </div>
        </main>
    </div>
<!-- <script type="text/javascript" src="jquery-3.6.0.min.js"></script> -->

</body>

<!-- <script src="js-upload.js"></script> -->
</html>


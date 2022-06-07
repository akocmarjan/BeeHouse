<?php
// Initialize the session
// session_start();
include('config.php');
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style-dashboard.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
</head>
<body>
    <input type="checkbox"  id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="search.php"><h2><span class="fab fa-forumbee"></span><span>BeeHouse</span></h2></a>
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
                    <a href="units.php" class=""><span class="fas fa-door-open"></span>
                    <span>Rooms</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-file-alt"></span>
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
                    <a href=""><span class="fas fa-tasks"></span>
                    <span>Tasks</span></a>
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
                    <h4>Marjan Carullo</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="wrapper">
            <form action="upload.php" id="uploadForm" method="POST">
                <div class="container">
                    <h2>Add Units</h2>
                    <div class="form-group">
                            <label>Unit Name</label>
                            <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <div class="select">
                            <select name="format" id="select_cat">
                                <option selected disabled="">Choose unit type below</option>
                                <?php
                                 // Fetch category
                                $sql_category = "SELECT * FROM category";
                                $category_data = mysqli_query($mysqli,$sql_category);
                                while($row = mysqli_fetch_assoc($category_data) ){
                                    $category_id = $row['id'];
                                    $category_name = $row['category_name'];
                                    // Option
                                    echo "<option value='".$category_id."' >".$category_name."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Amenities</label>
                        <div class="multiselect">
                            <div class="selectbox" onclick="showCheckboxes()">
                                <select>
                                    <option>Select amenities below</option>
                                </select>
                                <div class="overselect"></div>
                            </div>
                            <div id="checkboxes">
                                <label for="aircon"><input type="checkbox" id="aircon">Air Conditioning</label>
                                <label for="wifi"><input type="checkbox" id="wifi">Free Wifi</label>
                                <label for="kitchen"><input type="checkbox" id="kitchen">Kitchen</label>
                                <label for="bathroom"><input type="checkbox" id="bathroom">Bathroom</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address">
                    </div>
                    <div class="form-group">
                        <label>Upload Photo</label>
                        <div class="cord">
                            <div class="top">
                                <p>Drag & drop image uploading</p>
                            </div>
                            <form action="/upload" class="upload_img">
                                <span class="inner">Drag & drop image here or <span class="selectt">Browse</span></span>
                                <input name="file" type="file" class="file" multiple />
                            </form>
                            <div class="containerr"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Units"></input>
                    </div>
                </div>
            </form>
            </div>
            
        </main>
    </div>
    
</body>

<!-- <script src="js-upload.js"></script> -->
</html>
<script>

</script>

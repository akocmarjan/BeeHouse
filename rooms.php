<?php
// Initialize the session
session_start();
include('functions.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$property = $table->getProperty($_SESSION['partnerid']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
                    <a href="rooms.php" class="active"><span class="fas fa-door-open"></span>
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

                Rooms
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
                    <h2>Add Rooms</h2>
                    <form action="include/add-rooms-inc.php" id="postForm" method="post" enctype="multipart/form-data">
                        <div class="form-step form-step-active w3-animate-fading w3-animate-opacity">
                            <h1>Room name</h1>
                            <p class="p-med">Input a room name or room number to easily identify rooms.</p>
                            <div class="input-group">
                                <label for="propertyID">Property name</label>
                                <div class="select">
                                    <select name="propertyID" id="propertyID">
                                        <option selected disabled="">Choose unit type below</option>
                                        <?php
                                        foreach($property as $properties){
                                            echo "<option value='".$properties['id']."' >".$properties['property_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                 <label>Room number</label>
                                <input type="text" name="roomNumber">
                            </div>
                            <div class="">
                                <a href="#" class="btn btn-next width-50 ml-auto"><span>Continue</span></a>
                            </div>
                            <hr class="line">
                        </div>
                        <div class="form-step w3-animate-right w3-animate-opacity">
                            <h1>Room details</h1>
                            <p class="p-med">How many guest can stay in this room?</p>
                            <div class="input-group">
                                <label>Slots</label>
                                <input type="text" name="slots">
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-prev"><span>Back</span></a>
                                <a href="#" class="btn btn-next"><span>Continue</span></a>
                            </div>
                        </div>
                        <div class="form-step w3-animate-right">
                            <h1>Pricing</h1>
                            <p class="p-med">Customer payment options</p>
                            <div class="input-group">
                                <label>Price / Guest</label>
                                <input type="text" name="price">
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-prev"><span>Back</span></a>
                                <a href="#" class="btn btn-next"><span>Continue</span></a>
                            </div>
                        </div>
                        <div class="form-step w3-animate-right">
                            <h1>Photos</h1>
                            <p class="p-med">What does your room look like?</p>
                            <div class="input-group">
                                <label>Add atleast one photo now. You can always add more later.</label>
                                <div class="cord">
                                    <div class="top">
                                        <p>Drag & drop image uploading</p>
                                    </div>
                                    <form action="/upload" class="upload_img">
                                        <span class="inner">Drag & drop image here or <span class="selectt">Browse</span></span>
                                        <input type="file" name="image[]" id="files" multiple>
                                    </form>
                                    <div class="containerr"></div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-prev"><span>Back</span></a>
                                <button type="submit" name="submit" class="btn"><span>Add</span></button>
                            </div>
                        </div>
                       
                    </form>
                </div>

                <div class="units-wrapper">

                    <?php
                    foreach($property as $properties){
                  
                    ?>
                        <div class="units">
                            <div class="card">
                                <div class="card-header">
                                    <h3><?php echo $properties['property_name']?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <td>Room Number</td>
                                                    <td>Tenants</td>
                                                    <td>Price</td>
                                                    <td>Status</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $room = $table->getRoom($properties['id']);
                                                foreach($room as $rooms){
                                                ?>
                                                <tr>
                                                    
                                                    <td class="text-center"><?php echo $rooms['room_number']?></td>
                                                    <td class="text-center">0/<?php echo $rooms['slots']?></td>
                                                    <td class="text-center"><?php echo $rooms['price']?></td>
                                                    
                                                    <?php if($rooms['status'] == 1): ?>
                                                    <td class="text-center"><span class="badge badge-success"><span class="status green"></span>Available</span></td>
                                                    <?php elseif($rooms['status'] == 0): ?>
                                                    <td class="text-center"><span class="badge badge-default"><span class="status red"></span>Unavailable</span></td>
                                                    <?php else: ?>
                                                    <td class="text-center"><span class="badge badge-default"><span class="status orange"></span>Maintenance</span></td>
                                                    <?php endif; ?>
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

                    <?php } ?>
                </div>
                <!-- </div> -->
                <!-- Added Units Table -->


            </div>
        </main>
    </div>
    
    
</body>
<script type="text/javascript" src="multi-step.js"></script>
<!-- <script src="js-upload.js"></script> -->
</html>


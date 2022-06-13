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
    <title>Dashboard - Rooms</title>
    <link rel="icon" href="images/icon.png">
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
                    <a href="dashboard-partner-dashboard.php"><span class="fas fa-tachometer-alt"></span>
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
                    <a href="dashboard-partner-rooms.php" class="active"><span class="fas fa-door-open"></span>
                    <span>Rooms</span></a>
                </li>
                <li>
                    <a href="dashboard-partner-applicants.php"><span class="fas fa-file-alt"></span>
                    <span>Applicants</span></a>
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
                    Rooms
                </label>

               
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
                                            echo "<option value='".$properties['property_id']."' >".$properties['property_name']."</option>";
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
                    $room_id;
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
                                                $room = $table->getRoom($properties['property_id']);
                                                foreach($room as $rooms){
                                                ?>
                                                <tr>
                                                    
                                                    <td class="text-center"><?php echo $rooms['room_number']?></td>
                                                    <td class="text-center"><?php echo $rooms['tenants']. "/" .$rooms['slots']?></td>
                                                    <td class="text-center"><?php echo $rooms['price']?></td>
                                                    
                                                    <?php if($rooms['status'] == 1): ?>
                                                    <td class="text-center"><span class="badge badge-success"><span class="status green"></span>Available</span></td>
                                                    <?php elseif($rooms['status'] == 0): ?>
                                                    <td class="text-center"><span class="badge badge-default"><span class="status red"></span>Unavailable</span></td>
                                                    <?php else: ?>
                                                    <td class="text-center"><span class="badge badge-default"><span class="status orange"></span>Maintenance</span></td>
                                                    <?php endif; ?>
                                                    <td class="text-center">
                                                        <button class="cd-popup-trigger-update action button-approve update-room" data-room_id="<?php echo $rooms['id'] ?>" data-room_number="<?php echo $rooms['room_number'] ?>" data-room_slots="<?php echo $rooms['slots'] ?>" data-room_price="<?php echo $rooms['price'] ?>" type="button">Edit</button>
                                                        <button class="cd-popup-trigger action button-cancel del-room" data-room_id="<?php echo $rooms['id'] ?>" type="button">Delete</button>
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
                    <form action="include/delete-room-inc.php" method="post">
                        <div class="cd-popup" role="alert">
                            <div class="cd-popup-container">
                                <p>Are you sure you want to delete this room?</p>
                                <ul class="cd-buttons" style="list-style: none;">
                                    <input type="hidden" name="del_room_id" id="del_room_id">
                                    <li><input name="submit" type="submit" class="cd-button-yes" value="Yes"></input></li>
                                    <li><input type="button" class="cd-button-no" value="No"></input></li>
                                </ul>
                                <a href="#0" class="cd-popup-close img-replace">Close</a>
                            </div>
                        </div>
                    </form>
                    <form class="popup-update" action="include/update-room-inc.php" method="post" id="manage-room">
                        <div class="cd-popup-update" role="alert">
                            <div class="cd-popup-container">
                                <p>Press update to save the changes.</p>
                                <input type="hidden" name="roomID_updt" id="roomID_updt">
                                <div class="input-group">
                                    <label for="roomNumber_updt">Room number</label>
                                    <input type="text" name="roomNumber_updt" id="roomNumber_updt">
                                </div>
                                <div class="input-group">
                                    <label for="slots_updt">Slots</label>
                                    <input type="text" name="slots_updt" id="slots_updt">
                                </div>
                                <div class="input-group">
                                    <label for="price_updt">Price</label>
                                    <input type="text" name="price_updt" id="price_updt">
                                </div>
                                <div class="input-group">
                                    <label>Status</label>
                                    <div class="select">
                                        <select name="status_updt" id="status_updt">
                                            <option value=0>Unavailable</option>
                                            <option value=1>Available</option>
                                            <option value=2>Maintenance</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="cd-buttons" style="list-style: none;">
                                    <li><input name="submit" type="submit" class="cd-button-yes" value="Update"></input></li>
                                    <li><input type="button" class="cd-button-no" value="Cancel"></input></li>
                                </ul>
                                <a href="#0" class="cd-popup-close img-replace">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- </div> -->
                <!-- Added Units Table -->


            </div>
        </main>
    </div>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script src="popup.js"></script>
</body>
<script type="text/javascript" src="multi-step.js"></script>
<!-- <script src="js-upload.js"></script> -->
</html>


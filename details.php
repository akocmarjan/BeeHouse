<?php
// Initialize the session
session_start();
// include('config.php');
// include('select_cat.php');
// include('select_lessor.php');
$unit_id = $_GET['unit_id'];
// $sql_units = "SELECT * FROM units WHERE id = $unit_id";
// $units_data = mysqli_query($mysqli,$sql_units);
// while($row = mysqli_fetch_assoc($units_data) ):
//     $unit_name[$row['id']] = $row['name'];
//     $unitName = $row['name'];
//     $unitID = $row['id'];
//     $address = $row['address'];
//     $categoryType = $cat_name[$row['category_id']];
//     $host =  $lessor_name[$row['lessor_id']];
// endwhile;
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }
require ('functions.php');
$property = $table->getDatawParam($unit_id);
$rooms = $table->getRoom($unit_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body style="background-image:  linear-gradient(rgba(255,255,255,0.2),rgba(255,255,255,0.2)),url(images/banner2.png);">
    
    <?php include_once ('template.include/header.php') ?>
    <?php include_once ('template.include/signin-popup.php') ?>
    <div class="house-details">
        <?php foreach($property as $properties){ ?>
        <form class="house-form">
            <div class="house-title">
                <h1><?php echo $properties['property_name'] ?></h1>
                <div class="row">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <span>245 Reviews</span>
                    </div>
                    <div>
                        <p>Location: <?php echo $properties['barangay'] ?></p>
                    </div>
                </div>
            </div>
            <div class="gallery">
                <div class="gallery-img-1"><img src="images/house-1.png"></div>
                <div><img src="images/house-2.png"></div>
                <div><img src="images/house-3.png"></div>
                <div><img src="images/house-4.png"></div>
                <div><img src="images/house-5.png"></div>
            </div>
            <div class="small-details">
                <h2>Hosted by <?php echo $properties['username'] ?></h2>
                <p>2 guest &nbsp; 2 beds &nbsp; &nbsp; 1 bathroom</p>
            </div>
        </form>
        <hr class="line">
        <div class="rooms-form">
            <div class="room-title">
                <h1>Rooms</h1>
            </div>
            <?php foreach($rooms as $room){ ?>
            <div class="room-card">
                <h3><i class="fas fa-home"></i> <?php echo $room['room_number'] ?></h3>
                <?php if( $room['status'] == 0){?>
                    <h3><i class="fas fa-times-circle"></i> Not Available</h3>
                <?php }elseif($room['status'] == 2){?>
                    <h3><i class="fas fa-exclamation-circle"></i> Maintenance </h3>
                <?php }else{?>
                    <h3><i class="fas fa-check-circle"></i> Available </h3>
                <?php } ?>
                <h3><i class="fas fa-user"></i> <?php echo '0/'.$room['slots'] ?></h3>
                <h3><i class="fas fa-ruble-sign"></i> <?php echo $room['price'] ?></h3>
                
                <div class="form-group">
                    <?php
                        if(isset($_SESSION['userid'])){
                    ?>
                       <button class="cd-popup-trigger button1" value="Check in" ><span>Check in</span></button>
                    <?php
                        }else{
                    ?>
                        <a href="signup-tenant.php">
                            <button class="button1" value="Check in" ><span>Sign up</span></button>
                        </a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
            <form action="include/add-application-inc.php" method="post">
                <div class="cd-popup" role="alert">
                    <div class="cd-popup-container">
                        <p>Are you sure you want check in?</p>
                        <ul class="cd-buttons" style="list-style: none;">
                            <input type="hidden" name="room_id" value=<?php echo $room['id'] ?>>
                            <li><input name="submit" type="submit" class="cd-button-yes" value="Yes"></input></li>
                            <li><input type="button" class="cd-button-no" value="No"></input></li>
                        </ul>
                        <a href="#0" class="cd-popup-close img-replace">Close</a>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
        <!-- <form class="details-form">
            <ul class="details-list">
                <li><i class="fas fa-home"></i>Entire Home
                    <span>You will have the entire flat for you.</span>
                </li>
                <li><i class="fas fa-paint-brush"></i>Enchance Clean
                    <span>This host has commited to BeeHouse cleaning process.</span>
                </li>
                <li><i class="fas fa-map-marker-alt"></i>Great Location
                    <span>90% of recent guests gave the location a 5 star rating.</span>
                </li>
                <li><i class="fas fa-heart"></i>Great Check-in Experience
                    <span>You will have the entire flat for you.</span>
                </li>
            </ul>
        </form> -->
        <!-- <hr class="line">
        <p class="home-desc">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit 
        amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit 
        amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit 
        amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus 
        enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, 
        tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, 
        accumsan porttitor, facilisis luctus, metus</p>
        <hr class="line"> -->
        <div class="map">
            <h3>Location on map</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73842.8649005689!2d123.38502453869482!3d13.419288561145047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a199a3b60ba287%3A0xef4be6e51689b0db!2sRegal%20Plaza%20Hotel!5e0!3m2!1sen!2sph!4v1650175579081!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <b><?php echo $properties['barangay'] ?></b>
        </div>
        <hr class="line">
        <div class="host">
            <img src="images/host.png">
            <div>
                <h2>Hosted by <?php echo $properties['username'] ?></h2>
                <p><span>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </span>&nbsp; 245 reviews &nbsp; &nbsp; Response rate 100% &nbsp; & &nbsp; Response time: 60 min</p>
            </div>
            <a href="#" class="contact-host">Contact Host</a>
        </div>
        <?php } ?>
    </div>
    <?php include_once ('template.include/footer.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="popup.js"></script>
<script src="javascript.js"></script>
</body>
</html>

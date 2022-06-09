<?php
// Initialize the session
// session_start();
// include('config.php');
// include('select_cat.php');
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }
require ('functions.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style-search.css">
    <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav id="navBar" class="navbar-white">
    <a href="index.php"><img src="images/logo.png" class="logo"></a>
    <ul class="nav-links">
        <li><a href="#" class="active">Home</a></li>
    </ul>
        <!-- <a href="#" class="show-login">Login</a> -->
        <div class="login-btn">
            <button id="show-login">Login</button>
        </div>
    </nav>
    <div class="container">
        <div class="search-bar">
            <form>
                <div class="location-input">
                    <input type="text" placeholder="Where are you going?">
                </div>
                <button type="submit"><img src="images/search.png"></button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="list-container">
            <div class="left-col">
                <p>20+ Options</p>
                <h1>Recommended Places in San Miguel</h1>
                <hr class="line">
                <?php
                    // Fetch category
                    $sql_units = "SELECT * FROM units order by id asc";
                    $units_data = mysqli_query($mysqli,$sql_units);
                    while($row = mysqli_fetch_assoc($units_data) ):
                        $unit_name[$row['id']] = $row['name'];
                        $unitName = $row['name'];
                        $unitID = $row['id'];
                        $address = $row['address'];
                        $categoryType = $cat_name[$row['category_id']];
                        $phpfile = $row['phpfile'];
                        $_SESSION['phpfile'] = $phpfile;
                       
                ?>
            
                    <a href='details.php?unit_id=<?php echo $unitID ?>'>
                        <?php
                        $room_count = 0;
                        $sql_rooms = "SELECT * FROM rooms WHERE unit_id = $unitID order by id asc";
                        $rooms_data = mysqli_query($mysqli,$sql_rooms);
                        while($row = mysqli_fetch_assoc($rooms_data) ):
                            $roomNumber = $row['room_number'];
                            $slots = $row['slots'];
                            $tenants = $row['tenants'];
                            $price = $row['price'];
                            $status = $row['status'];
                            $room_count++;
                        endwhile;
                        ?>
                        <div class="house">
                            <div class="house-img">
                                <?php 
                                $sql_images = "SELECT * FROM unit_images WHERE unit_id = $unitID";
                                $mq = mysqli_query($mysqli,$sql_images) or die ("not working query $sql_images");
                                $row = mysqli_fetch_assoc($mq);
                                $s = $row['image_name']; 
                                ?>
                                <img src='imagess/<?php echo $s ?>'>
                            </div>
                            <div class="house-info">
                                <p><?php echo $categoryType ?> in <?php echo $address ?></p>
                                <h3><?php echo $unitName ?></h3>
                                <p>1 Bedroom/1 Bathroom</p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <div class="house-price">
                                    <p><?php echo $room_count ?> Room</p>
                                    <h4>P<?php echo $price ?><span> / Month</span></h4>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="line">

                <?php endwhile; ?>
               
                <!-- <hr class="line">
                <div class="house">
                    <div class="house-img">
                        <img src="images/house-2.png">
                    </div>
                    <div class="house-info">
                        <p>Boarding House in San Miguel</p>
                        <h3>Deluxe Queen Room</h3>
                        <p>1 Bedroom/1 Bathroom</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <div class="house-price">
                            <p>1 Person</p>
                            <h4>$1,200<span> / Month</span></h4>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="house">
                    <div class="house-img">
                        <img src="images/house-3.png">
                    </div>
                    <div class="house-info">
                        <p>Boarding House in San Miguel</p>
                        <h3>Deluxe Queen Room</h3>
                        <p>1 Bedroom/1 Bathroom</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <div class="house-price">
                            <p>1 Person</p>
                            <h4>$1,200<span> / Month</span></h4>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="house">
                    <div class="house-img">
                        <img src="images/house-4.png">
                    </div>
                    <div class="house-info">
                        <p>Boarding House in San Miguel</p>
                        <h3>Deluxe Queen Room</h3>
                        <p>1 Bedroom/1 Bathroom</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <div class="house-price">
                            <p>1 Person</p>
                            <h4>$1,200<span> / Month</span></h4>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="house">
                    <div class="house-img">
                        <img src="images/house-5.png">
                    </div>
                    <div class="house-info">
                        <p>Boarding House in San Miguel</p>
                        <h3>Deluxe Queen Room</h3>
                        <p>1 Bedroom/1 Bathroom</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <div class="house-price">
                            <p>1 Person</p>
                            <h4>$1,200<span> / Month</span></h4>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="right-col">
                <div class="sidebar">
                    <h2>Select Filter</h2>
                    <h3>Property Type</h3>
                    <div class="filter">
                        <input type="checkbox"> <p>Boarding House</p> <span>(0)</span>
                    </div>
                    <div class="filter">
                        <input type="checkbox"> <p>Bed Spacer</p> <span>(0)</span>
                    </div>
                    <div class="filter">
                        <input type="checkbox"> <p>Apartment</p> <span>(0)</span>
                    </div>
                    <h3>Amenities</h3>
                    <div class="filter">
                        <input type="checkbox"> <p>Air Conditioning</p> <span>(0)</span>
                    </div>
                    <div class="filter">
                        <input type="checkbox"> <p>Free Wifi</p> <span>(0)</span>
                    </div>
                    <div class="filter">
                        <input type="checkbox"> <p>Kitchen</p> <span>(0)</span>
                    </div>
                    <div class="filter">
                        <input type="checkbox"> <p>Bathroom</p> <span>(0)</span>
                    </div>

                    <div class="sidebar-link">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <h3><</h3>
            <span class="current">1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>&middot; &middot; &middot; &middot;</span>
            <span>20</span>
            <h3>></h3>
            
        </div>







        <div class="footer">
            <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-instagram-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-youtube-square"></i></a>
            <a href="https://facebook.com/"><i class="fab fa-twitter-square"></i></a>
            <hr>
            <p>Copyright © 2021, Bee House</p>
        </div>
    </div>
</body>
</html>

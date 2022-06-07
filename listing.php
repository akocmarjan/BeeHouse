<?php
// Initialize the session
session_start();
// include('config.php');
// include('select_cat.php');
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }
require ('functions.php');

$unit_shuffle = $table->getData();


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
        <!-- <li><a href="#" class="active">Home</a></li> -->
    </ul>
    <div class="topright">
        <?php
            if(isset($_SESSION['userid'])){
        ?>
            <a href="profile_tenant.php">
            <img src="images/user.png" width="30px" height="30px" alt="">
            </a>
            <div>
                <h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
                <small>Bee</small>
            </div>
        <?php
            }else{
        ?>
            <button id="show-login">Sign In</button>
        <?php
            }
        ?>
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
                <?php foreach ($unit_shuffle as $listing){ ?>
                <a href='details.php?unit_id=<?php echo $listing['id'] ?>'>
                    <div class="house">
                        <div class="house-img">
                            <img src= <?php echo "imagess/".$listing['image_name'] ?>>
                        </div>
                        <div class="house-info">
                            <p><?php echo $listing['category_name'] ?> in <?php echo $listing['address'] ?></p>
                            <h3><?php echo $listing['name'] ?></h3>
                            <h4><?php if($listing['available_for'] == 1){
                                echo "Male Only";
                            }elseif($listing['available_for'] == 0){
                                echo "Female Only";
                            }else{
                                echo "Male and Female";
                            } ?></h4>
                            <p>1 Bedroom/1 Bathroom</p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <div class="house-price">
                                <button class="button1" value="Learn More" ><span>Learn More</span></button>
                            </div>
                        </div>
                    </div>
                </a>
                <hr class="line">
                <?php } ?>
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

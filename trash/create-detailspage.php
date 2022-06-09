<?php
include ('config.php');
// Create profile page.
// $fp=fopen('ofeliacoderobedspacer.php','w');

// fwrite($fp, $string);
// fclose($fp);

$string = '<?php
// Initialize the session
session_start();
include ("config.php");
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }
$php = htmlspecialchars($_SESSION["phpfile"]);
$sql_units = "SELECT * FROM units WHERE phpfile = \'$php\'";
$units_data = mysqli_query($mysqli,$sql_units);
while($row = mysqli_fetch_assoc($units_data) ):
    $unitName = $row["name"];
    $address = $row["address"];
    $total_tenants = $row["total_tenants"]

?>
<?php endwhile; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="style-details.css">
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
    <div class="house-details">
        <form class="house-form">
            <div class="house-title">
                <h1><?php echo $unitName ?></h1>
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
                        <p>Location: San Miguel, Iriga City</p>
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
                <h2>Entire rental hosted by Zams Apartel</h2>
                <p>2 guest &nbsp; 2 beds &nbsp; &nbsp; 1 bathroom</p>
                <h4>$1200 / Month</h4>
            </div>
        </form>
        <hr class="line">
        <form class="check-form">
            <div>
                <label>Check-in</label>
                <input type="text" placeholder="Add date">
            </div>
            <div>
                <label>Check-out</label>
                <input type="text" placeholder="Add date">
            </div>
            <div class="guest-field">
                <label>Guest</label>
                <input type="text" placeholder="2 guest">
            </div>
            <button type="submit">Check Availability</button>
        </form>
        <form class="details-form">
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
        </form>
        <hr class="line">
        <p class="home-desc">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit 
        amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit 
        amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit 
        amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus 
        enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, 
        tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, 
        accumsan porttitor, facilisis luctus, metus</p>
        <hr class="line">
        <div class="map">
            <h3>Location on map</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73842.8649005689!2d123.38502453869482!3d13.419288561145047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a199a3b60ba287%3A0xef4be6e51689b0db!2sRegal%20Plaza%20Hotel!5e0!3m2!1sen!2sph!4v1650175579081!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <b>San Miguel, Iriga City</b>
        </div>
        <hr class="line">
        <div class="host">
            <img src="images/host.png">
            <div>
                <h2>Hosted by Zams Apartel</h2>
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
</html>';
	$fp = fopen($phpfile.".php", 'w');
	fwrite($fp, $string);
	fclose($fp);
 
    
$handle = fopen($phpfile.".php", 'w');
function createDetails() {
    fwrite($handle, $string);
    fclose($fp);
}

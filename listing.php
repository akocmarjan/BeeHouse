<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
// }

require ('functions.php');
$results_per_page = 5;

if(!isset($_GET['page'])){
    $page  = 1;
}else{
    $page = $_GET['page'];
}


if(isset($_POST['submit'])){
    $search_term = $_POST['search-term'];
    $num_row = $table->getRows($search_term);
    $number_of_pages = ceil($num_row/$results_per_page);
    $this_page_first_result = ($page-1)*$results_per_page;
    $search_result = $table->getSearchResult($search_term,$this_page_first_result, $results_per_page);
}else{
    $num_row = $table->getRows("%");
    $number_of_pages = ceil($num_row/$results_per_page);
    $this_page_first_result = ($page-1)*$results_per_page;
    $search_result = $table->getSearchResult("%",$this_page_first_result, $results_per_page);
    
}





?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bee House</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/6ee19359d3.js" crossorigin="anonymous"></script>
        
    </head>
    <body style="background-image:  linear-gradient(rgba(255,255,255,0.2),rgba(255,255,255,0.2)),url(images/banner2.png);">

        <?php include_once ('template.include/header.php') ?>
        <?php include_once ('template.include/signin-popup.php') ?>
        
        <div class="container">
            <div class="list-container">
                <div class="left-col">
                    
                    <?php if(isset($_POST['submit'])){
                        echo "<p>". $num_row." Options</p>";
                        echo "<h1>Recommended Places in ". $search_term ."</h1>";
                        echo '<hr class="line">';
                    }else{
                        echo "<p>". $num_row." Options</p>";
                        echo "<h1>Listings as of now </h1>";
                        echo '<hr class="line">';
                    } ?>
                    
                    
                    <?php foreach ($search_result as $listing){ ?>
                    <a href='details.php?unit_id=<?php echo $listing['property_id'] ?>'>
                        <div class="house">
                            <div class="house-img">
                                <img src= <?php echo "imagess/".$listing['image_name'] ?>>
                            </div>
                            <div class="house-info">
                                <p><span><?php echo $listing['category_name'] ?></span> in <?php echo $listing['barangay'].", ".$listing['city'] ?></p>
                                <h3><?php echo $listing['property_name'] ?></h3>
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
                </div>
                <!-- <div class="right-col">
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
                </div> -->
            </div>

            <div class="pagination">
                <h3><i class="fas fa-caret-left"></i></h3>
                <?php for($page=1;$page<=$number_of_pages;$page++){
                    
                    echo '<a href="listing.php?page=' . $page . '"><span>' . $page . '</span></a>';
                } ?>
                <h3><i class="fas fa-caret-right"></i></h3>
            </div>
        </div>

       
        <?php include_once ('template.include/footer.php') ?>
        <script src="javascript.js"></script>
    </body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
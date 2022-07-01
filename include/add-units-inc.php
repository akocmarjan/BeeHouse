<?php
session_start();
if(isset($_POST['submit']))
{

    $property_name = $_POST['propertyName'];
    $category_id = $_POST['categoryID'];
    $region = $_POST['regionSelected'];
    $province = $_POST['provinceSelected'];
    $city = $_POST['citySelected'];
    $barangay = $_POST['barangaySelected'];
    $postal = $_POST['postal'];
    $lessor_id = htmlspecialchars($_SESSION['partnerid']);
    $available_for = $_POST['availableFor'];
    $rand_id = rand(time(), 100000000);
    $bathroom_count = $_POST['amnty-br'];
    $kitchen_count = $_POST['amnty-kc'];
    $null_count = 0;

    include '../classes/dbh-classes.php';
    include '../classes/add-units-classes.php';
    include '../classes/add-units-contr-classes.php';
    include '../classes/add-amenity-classes.php';
    include '../classes/add-amenity-contr-classes.php';

    $addunits = new AddunitsContr($property_name, $category_id, $region, $province, $city, $barangay, $postal, $lessor_id, $available_for, $rand_id);

    $addunits->addUnits();

    if(!empty($_POST['amenity'])) {

        foreach($_POST['amenity'] as $value){
            if($value == 1){
                $addamenity = new AddamenityContr($value, $rand_id, $bathroom_count);
                $addamenity->addAmenity();
            }elseif($value == 2){
                $addamenity = new AddamenityContr($value, $rand_id, $kitchen_count);
                $addamenity->addAmenity();
            }else{
                $addamenity = new AddamenityContr($value, $rand_id, $null_count);
                $addamenity->addAmenity();
            }
        }

    }

    header("location: ../dashboard-partner-property.php?error=none");
}
?>
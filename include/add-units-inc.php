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
   
    include '../classes/dbh-classes.php';
    include '../classes/add-units-classes.php';
    include '../classes/add-units-contr-classes.php';

    $addunits = new AddunitsContr($property_name, $category_id, $region, $province, $city, $barangay, $postal, $lessor_id, $available_for);

    $addunits->addUnits();

    header("location: ../dashboard-partner-property.php?error=none");
}
?>
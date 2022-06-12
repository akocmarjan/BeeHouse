<?php
session_start();
if(isset($_POST['submit']))
{
	$propertyName_updt = $_POST['propertyName_updt'];
    $categoryID_updt = $_POST['categoryID_updt'];
    $region_updt = $_POST['region_updt'];
    $province_updt = $_POST['province_updt'];
    $city_updt = $_POST['city_updt'];
    $barangay_updt = $_POST['barangay_updt'];
    $postal_updt = $_POST['postal_updt'];
    $availableFor_updt = $_POST['availableFor_updt'];
    $property_id = $_POST['propertyID_updt'];

    include '../classes/dbh-classes.php';
    include '../classes/update-classes.php';
    include '../classes/update-property-contr-classes.php';

    $updateproperty = new UpdateContr($propertyName_updt, $categoryID_updt, $region_updt, $province_updt, $city_updt, $barangay_updt, $postal_updt, $availableFor_updt, $property_id);

    $updateproperty->updateProperty();

    header("location: ../dashboard-partner-property.php?error=none");
}
?>
<?php
session_start();
if(isset($_POST['submit']))
{
	$property_id = $_POST['del_property_id'];
    $rand_id = $_POST['del_rand_id'];

    include '../classes/dbh-classes.php';
    include '../classes/delete-classes.php';
    include '../classes/delete-contr-classes.php';

    $deleteproperty = new DeleteContr($property_id);
    $deleteamenity = new DeleteContr($rand_id);
    $deleteproperty->deleteProperty();
    $deleteproperty->deleteImage();
    $deleteamenity->deleteAmenity();

    header("location: ../dashboard-partner-property.php?error=none");
}
?>
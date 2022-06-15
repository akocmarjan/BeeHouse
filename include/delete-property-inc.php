<?php
session_start();
if(isset($_POST['submit']))
{
	$property_id = $_POST['del_property_id'];

    include '../classes/dbh-classes.php';
    include '../classes/delete-classes.php';
    include '../classes/delete-contr-classes.php';

    $deleteproperty = new DeleteContr($property_id);

    $deleteproperty->deleteProperty();

    header("location: ../dashboard-partner-property.php?error=none");
}
?>
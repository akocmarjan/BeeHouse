<?php
session_start();
if(isset($_POST['submit']))
{

    $unit_name = $_POST['unitName'];
    $category_id = $_POST['categoryID'];
    $address = $_POST['address'];
    $lessor_id = htmlspecialchars($_SESSION['userid']);
    $available_for = $_POST['availableFor'];
   
    include '../classes/dbh-classes.php';
    include '../classes/add-units-classes.php';
    include '../classes/add-units-contr-classes.php';

    $addunits = new AddunitsContr($unit_name, $category_id, $address, $lessor_id, $available_for);

    $addunits->addUnits();

    header("location: ../units.php?error=none");
}
?>
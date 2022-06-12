<?php
session_start();
if(isset($_POST['submit']))
{
    $application_id = $_POST['applicants_id'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];

    include '../classes/dbh-classes.php';
    include '../classes/add-tenant-classes.php';
    include '../classes/add-tenant-contr-classes.php';
    include '../classes/delete-application-classes.php';
    include '../classes/delete-application-contr-classes.php';

    $addtenant = new AddtenantContr($room_id, $user_id);

    $addtenant->addTenant();

    $deleteapplication = new DeleteapplicationContr($application_id);

    $deleteapplication->deleteApplication();

    header("location: ../dashboard-partner-tenants.php?error=none");
}
?>
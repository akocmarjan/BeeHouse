<?php
session_start();
if(isset($_POST['submit']))
{
    $application_id = $_POST['application_id'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];

    include '../classes/dbh-classes.php';
    include '../classes/add-tenant-classes.php';
    include '../classes/add-tenant-contr-classes.php';
    include '../classes/delete-application-classes.php';
    include '../classes/delete-application-contr-classes.php';
    include '../classes/update-classes.php';
    include '../classes/update-room.addsubtenant-contr-classes.php';


    $addtenant = new AddtenantContr($room_id, $user_id);
    $addtenant->addTenant();

    $inctenant = new UpdateRoomAddContr($room_id);
    $inctenant->updateAddOneTenant();

    $deleteapplication = new DeleteapplicationContr($application_id);
    $deleteapplication->deleteApplication();


    header("location: ../dashboard-partner-tenants.php?error=none");
}
?>
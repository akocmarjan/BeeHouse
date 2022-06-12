<?php
session_start();
if(isset($_POST['submit']))
{

    $room_id = $_POST['room_id'];
	$user_id = htmlspecialchars($_SESSION['userid']);

    include '../classes/dbh-classes.php';
    include '../classes/add-application-classes.php';
    include '../classes/add-application-contr-classes.php';

    $addapplication = new AddapplicationContr($room_id, $user_id);

    $addapplication->addApplication();

    header("location: ../listing.php?error=none");
}
?>
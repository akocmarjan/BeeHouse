<?php
session_start();
if(isset($_POST['submit']))
{
	$room_id = $_POST['del_room_id'];

    include '../classes/dbh-classes.php';
    include '../classes/delete-classes.php';
    include '../classes/delete-contr-classes.php';

    $deleteroom = new DeleteContr($room_id);

    $deleteroom->deleteRoom();

    header("location: ../dashboard-partner-rooms.php?error=none");
}
?>
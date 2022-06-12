<?php
session_start();
if(isset($_POST['submit']))
{
	$roomNumber_updt = $_POST['roomNumber_updt'];
    $slots_updt = $_POST['slots_updt'];
    $price_updt = $_POST['price_updt'];
    $status_updt = $_POST['status_updt'];
    $roomID_updt = $_POST['roomID_updt'];

    include '../classes/dbh-classes.php';
    include '../classes/update-classes.php';
    include '../classes/update-room-contr-classes.php';

    $update = new UpdateRoomContr($roomNumber_updt, $slots_updt, $price_updt, $status_updt, $roomID_updt);

    $update->updateRoom();

    header("location: ../dashboard-partner-rooms.php?error=none");
}
?>
<?php
session_start();
if(isset($_POST['submit']))
{
	$tenant_id = $_POST['del_tenant_id'];
    $room_id = $_POST['del_room_id'];

    include '../classes/dbh-classes.php';
    include '../classes/delete-classes.php';
    include '../classes/delete-contr-classes.php';
    include '../classes/update-classes.php';
    include '../classes/update-room.addsubtenant-contr-classes.php';

    $del = new DeleteContr($tenant_id);
    $del->deleteTenant();

    $subtenant = new UpdateRoomAddContr($room_id);
    $subtenant->updateSubOneTenant();

    header("location: ../dashboard-partner-tenants.php?error=none");
}
?>
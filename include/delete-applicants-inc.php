<?php
session_start();
if(isset($_POST['submit']))
{
	$application_id = $_POST['application_id'];

    include '../classes/dbh-classes.php';
    include '../classes/delete-application-classes.php';
    include '../classes/delete-application-contr-classes.php';

    $deleteapplication = new DeleteapplicationContr($application_id);

    $deleteapplication->deleteApplication();

    header("location: ../dashboard-partner-applicants.php?error=none");
}
?>
<?php
session_start();
include 'config.php';
if(isset($_POST['submit']))
{
	$unitName = $_POST['unitName'];
	$address = $_POST['address'];
	$category_id = $_POST['format'];
	$lessor_id = htmlspecialchars($_SESSION["lessorid"]);
	$str = str_replace(' ', '', $unitName);
	$phpfile = strtolower($str);


    $stmt="INSERT INTO units(name, address, category_id, lessor_id, phpfile) values('$unitName', '$address', '$category_id', '$lessor_id','$phpfile')";
    mysqli_query($mysqli,$stmt);

	// $fp=fopen($phpfile.'.php','w');
	// fwrite($fp, 'data to be written');
	// fclose($fp);
	
	

	header('Location: units.php');
    

}

?>
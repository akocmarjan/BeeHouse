<?php
include 'config.php';
if(isset($_POST['submit']))
{
	$roomNumber = $_POST['roomNumber'];
	$slots = $_POST['slots'];
	$price = $_POST['price'];
	$unitID = $_POST['format'];
	$status = $_POST['status'];

    $stmt="INSERT INTO rooms(room_number, slots, price, unit_id, status) values('$roomNumber', '$slots', '$price','$unitID','$status')";
    mysqli_query($mysqli,$stmt);

	$extension=array('jpeg','jpg','png','gif');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('imagess/'.$filename))
			{
			move_uploaded_file($filename_tmp, 'imagess/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, 'imagess/'.$newfilename);
				 $finalimg=$newfilename;
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
			$insertqry="INSERT INTO `unit_images`( `image_name`, `image_createtime`,`unit_id`) VALUES ('$finalimg','$creattime','$unitID')";
			mysqli_query($mysqli,$insertqry);

			header('Location: rooms.php');
		}else
		{
			//display error
		}
	}

}

?>
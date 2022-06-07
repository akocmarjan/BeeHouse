<?php
session_start();
if(isset($_POST['submit']))
{

    $unit_id = $_POST['unitID'];
    $room_number = $_POST['roomNumber'];
    $slots = $_POST['slots'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    include '../classes/dbh-classes.php';
    include '../classes/add-rooms-classes.php';
    include '../classes/add-rooms-contr-classes.php';
    include '../classes/add-images-classes.php';
    include '../classes/add-images-contr-classes.php';

    $extension=array('jpeg','jpg','png','gif');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('../imagess/'.$filename))
			{
			move_uploaded_file($filename_tmp, '../imagess/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, '../imagess/'.$newfilename);
				 $finalimg=$newfilename;
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
            $addimages = new AddimagesContr($finalimg, $creattime, $unit_id);
            $addimages->addImages();

		}else
		{
			header("location: ../rooms.php?error=imgerror");
		}
	}

    $addrooms = new AddroomsContr($unit_id, $room_number, $slots, $price, $status);

    $addrooms->addRooms();

    header("location: ../rooms.php?error=none");
}
?>
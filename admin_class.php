<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'config.php';
    
    $this->db = $mysqli;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function add_units(){
		extract($_POST);
		$data = " unit_name = '$name' ";
        $data .= ", address = '$address' ";
		// if($_FILES['file']['tmp_name'] != ''){
		// 				$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
		// 				$move = move_uploaded_file($_FILES['file']['tmp_name'],'../assets/img/'. $fname);
		// 			$data .= ", photos = '$fname' ";

		// }
		if(empty($id)){
			$save = $this->db->query("INSERT INTO units set ".$data);
		}else{
			$save = $this->db->query("UPDATE units set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	// function delete_apartment(){
	// 	extract($_POST);
	// 	$delete = $this->db->query("DELETE FROM room_categories where id = ".$id);
	// 	if($delete)
	// 		return 1;
	// }
	
}
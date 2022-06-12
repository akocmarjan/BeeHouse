<?php
class Addtenant extends Dbh{

    protected function setTenant($room_id, $user_id){
        $result = $this->connect()->prepare("INSERT INTO tenant ( `room_id`, `user_id`) VALUES (?,?);");

        if(!$result->execute(array($room_id, $user_id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function checkTenant($user_id, $room_id){
        $result = $this->connect()->prepare("SELECT id FROM tenant WHERE user_id = ? AND room_id = ?;");

        if(!$result->execute(array($user_id, $room_id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

       $resultCheck;
       if($result->rowCount() > 0){
           $resultCheck = false;
       }else{
           $resultCheck = true;
       }

       return $resultCheck;
    }

}
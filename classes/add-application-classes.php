<?php
class Addapplication extends Dbh{

    protected function setApplication($room_id, $user_id){
        $result = $this->connect()->prepare("INSERT INTO applicants ( `room_id`, `user_id`) VALUES (?,?);");

        if(!$result->execute(array($room_id, $user_id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function checkUser($user_id){
        $result = $this->connect()->prepare("SELECT id FROM applicants WHERE user_id = ?;");

        if(!$result->execute(array($user_id))){
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

    protected function checkIfRoomTenant($user_id){
        $result = $this->connect()->prepare("SELECT id FROM tenant WHERE user_id = ?;");

        if(!$result->execute(array($user_id))){
            $result = null;
            header("location: ../listing.php?error=sqlchecktenantfailed");
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

    protected function checkIfRoomAvailable($room_id){
        $result = $this->connect()->prepare("SELECT status FROM room WHERE id = ?;");

        if(!$result->execute(array($room_id))){
            $result = null;
            header("location: ../listing.php?error=sqlchecktenantfailed");
            exit();
        }

       $resultCheck;
       $value = $result->fetchColumn();
       if($value == 0 || $value == 2){
           $resultCheck = false;
       }else{
           $resultCheck = true;
       }

       return $resultCheck;
    }

    protected function checkIfRoomFull($room_id){
        $slots = $this->connect()->prepare("SELECT slots FROM room WHERE id = ?;");

        if(!$slots->execute(array($room_id))){
            $slots = null;
            header("location: ../listing.php?error=sqlchecktenantfailed");
            exit();
        }

        $tenants = $this->connect()->prepare("SELECT tenants FROM room WHERE id = ?;");

        if(!$tenants->execute(array($room_id))){
            $tenants = null;
            header("location: ../listing.php?error=sqlchecktenantfailed");
            exit();
        }

       $resultCheck;
       
       if($slots->fetchColumn() == $tenants->fetchColumn()){
           $resultCheck = false;
       }else{
           $resultCheck = true;
       }

       return $resultCheck;
    }

}
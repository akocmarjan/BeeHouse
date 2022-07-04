<?php

class AddapplicationContr extends Addapplication{

    private $room_id;
    private $user_id;

    public function __construct($room_id, $user_id){
        $this->room_id = $room_id;
        $this->user_id = $user_id;
    }

    public function addApplication(){
        if($this->applicationCheck() == false){
            // echo "Already applied!";
            $_SESSION['flash'] = 'alreadyapplied';
            header("location: ../listing.php?error=alreadyapplied");
            exit();
        }
        if($this->roomTenantCheck() == false){
            // echo "Already applied!";
            $_SESSION['flash'] = 'roomtenant';
            header("location: ../listing.php?error=roomtenant");
            exit();
        }
        if($this->roomAvailableCheck() == false){
            // echo "Room unavailable";
            $_SESSION['flash'] = 'availability';
            header("location: ../listing.php?error=notavailable");
            exit();
        }
        if($this->roomFullCheck() == false){
            // echo "Room Full";
            $_SESSION['flash'] = 'full';
            header("location: ../listing.php?error=full");
            exit();
        }

        $this->setApplication($this->room_id, $this->user_id);
    }

    private function applicationCheck(){
        $result;
        if(!$this->checkUser($this->user_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function roomTenantCheck(){
        $result;
        if(!$this->checkIfRoomTenant($this->user_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function roomAvailableCheck(){
        $result;
        if(!$this->checkIfRoomAvailable($this->room_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function roomFullCheck(){
        $result;
        if(!$this->checkIfRoomFull($this->room_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
   
}
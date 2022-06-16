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
   
}
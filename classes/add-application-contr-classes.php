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
            header("location: ../listing.php?error=alreadyapplied");
            exit();
        }

        $this->setApplication($this->room_id, $this->user_id);
    }

    private function applicationCheck(){
        $result;
        if(!$this->checkUser($this->user_id, $this->room_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
   
}
<?php

class AddtenantContr extends Addtenant{

    private $room_id;
    private $user_id;

    public function __construct($room_id, $user_id){
        $this->room_id = $room_id;
        $this->user_id = $user_id;
    }

    public function addTenant(){
        if($this->tenantCheck() == false){
            // echo "Already applied!";
            header("location: ../listing.php?error=alreadyapplied");
            exit();
        }

        $this->setTenant($this->room_id, $this->user_id);
    }

    private function tenantCheck(){
        $result;
        if(!$this->checkTenant($this->user_id, $this->room_id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
   
}
<?php

class AddapplicationContr extends Addapplication{

    private $room_id;
    private $tenant_id;

    public function __construct($room_id, $tenant_id){
        $this->room_id = $room_id;
        $this->tenant_id = $tenant_id;
    }

    public function addApplication(){
        $this->setApplication($this->room_id, $this->tenant_id);
    }
   
}
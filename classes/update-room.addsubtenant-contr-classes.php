<?php

class UpdateRoomAddContr extends Update{

    private $room_id;

    public function __construct($room_id){
        $this->room_id = $room_id;
    }

    public function updateAddOneTenant(){
        $this->setAddition($this->room_id);
    }

    public function updateSubOneTenant(){
        $this->setSubtraction($this->room_id);
    }


}
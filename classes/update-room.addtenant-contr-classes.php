<?php

class UpdateRoomAddContr extends Update{

    private $room_id;

    public function __construct($room_id){
        $this->room_id = $room_id;
    }

    public function updateRoom(){
        $this->setTenant($this->room_id);
    }


}
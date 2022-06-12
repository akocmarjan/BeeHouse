<?php

class UpdateRoomContr extends Update{

    private $roomNumber_updt;
    private $slots_updt;
    private $price_updt;
    private $status_updt;
    private $roomID_updt;

    public function __construct($roomNumber_updt, $slots_updt, $price_updt, $status_updt, $roomID_updt){
        $this->roomNumber_updt = $roomNumber_updt;
        $this->slots_updt = $slots_updt;
        $this->price_updt = $price_updt;
        $this->status_updt = $status_updt;
        $this->roomID_updt = $roomID_updt;
    }

    public function updateRoom(){
        $this->setRoom($this->roomNumber_updt, $this->slots_updt, $this->price_updt, $this->status_updt, $this->roomID_updt);
    }


}
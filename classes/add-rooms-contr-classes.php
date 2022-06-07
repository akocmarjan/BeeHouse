<?php

class AddroomsContr extends Addrooms{

    private $unit_id;
    private $room_number;
    private $slots;
    private $price;
    private $status;

    public function __construct($unit_id, $room_number, $slots, $price, $status){
        $this->unit_id = $unit_id;
        $this->room_number = $room_number;
        $this->slots = $slots;
        $this->price = $price;
        $this->status = $status;
    }

    public function addRooms(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../rooms.php?error=emptyinput");
            exit();
        }

        $this->setRooms($this->unit_id, $this->room_number, $this->slots, $this->price, $this->status);
    }

    private function emptyInput(){
        $result;
        if(empty($this->unit_id) || empty($this->room_number) || empty($this->slots) || empty($this->price)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

   
}
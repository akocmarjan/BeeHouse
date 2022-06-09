<?php

class AddroomsContr extends Addrooms{

    private $property_id;
    private $room_number;
    private $slots;
    private $price;

    public function __construct($property_id, $room_number, $slots, $price){
        $this->property_id = $property_id;
        $this->room_number = $room_number;
        $this->slots = $slots;
        $this->price = $price;
    }

    public function addRooms(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../room.php?error=emptyinput");
            exit();
        }

        $this->setRooms($this->property_id, $this->room_number, $this->slots, $this->price);
    }

    private function emptyInput(){
        $result;
        if(empty($this->property_id) || empty($this->room_number) || empty($this->slots) || empty($this->price)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

   
}
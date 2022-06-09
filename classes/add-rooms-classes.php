<?php
class Addrooms extends Dbh{

    protected function setRooms($property_id, $room_number, $slots, $price){
        $result = $this->connect()->prepare("INSERT INTO room (property_id, room_number, slots, price) VALUES (?,?,?,?);");

        if(!$result->execute(array($property_id, $room_number, $slots, $price))){
            $result = null;
            header("Location: ../rooms.php?error=sqlfail");
            exit();
        }

        $result = null;
    }

}
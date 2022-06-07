<?php
class Addrooms extends Dbh{

    protected function setRooms($unit_id, $room_number, $slots, $price, $status){
        $result = $this->connect()->prepare("INSERT INTO rooms (unit_id, room_number, slots, price, status) VALUES (?,?,?,?,?);");

        if(!$result->execute(array($unit_id, $room_number, $slots, $price, $status))){
            $result = null;
            header("Location: ../rooms.php?error=sqlfailede");
            exit();
        }

        $result = null;
    }

}
<?php
class Addamenity extends Dbh{

    protected function setAmenity($amenity_category_id, $rand_id, $count){
        $result = $this->connect()->prepare("INSERT INTO amenity (amenity_category_id, rand_id, count) VALUES (?,?,?);");

        if(!$result->execute(array($amenity_category_id, $rand_id, $count))){
            $result = null;
            header("Location: ../profile.php?error=sqlamenityfailed");
            exit();
        }

        $result = null;
    }

}
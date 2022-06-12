<?php
class Update extends Dbh{

    protected function setProperty($propertyName_updt, $categoryID_updt, $region_updt, $province_updt, $city_updt, $barangay_updt, $postal_updt, $availableFor_updt, $property_id){
        $result = $this->connect()->prepare("UPDATE property SET property_name = ?, category_id = ?, region = ?, province = ?, city = ?, barangay = ?, postal = ?, available_for = ? WHERE id = ?;");

        if(!$result->execute(array($propertyName_updt, $categoryID_updt, $region_updt, $province_updt, $city_updt, $barangay_updt, $postal_updt, $availableFor_updt, $property_id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function setRoom($roomNumber_updt, $slots_updt, $price_updt, $status_updt, $roomID_updt){
        $result = $this->connect()->prepare("UPDATE room SET room_number = ?, slots = ?, price = ?, status = ? WHERE id = ?;");

        if(!$result->execute(array($roomNumber_updt, $slots_updt, $price_updt, $status_updt, $roomID_updt))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

}
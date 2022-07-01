<?php
class Addunits extends Dbh{

    protected function setUnits($property_name, $category_id, $region, $province, $city, $barangay, $postal, $lessor_id, $available_for, $rand_id){
        $result = $this->connect()->prepare("INSERT INTO property (property_name, category_id, region, province, city, barangay, postal, lessor_id, available_for, rand_id) VALUES (?,?,?,?,?,?,?,?,?,?);");

        if(!$result->execute(array($property_name, $category_id, $region, $province, $city, $barangay, $postal, $lessor_id, $available_for, $rand_id))){
            $result = null;
            header("Location: ../profile.php?error=sqlfailede");
            exit();
        }

        $result = null;
    }

}
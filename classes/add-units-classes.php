<?php
class Addunits extends Dbh{

    protected function setUnits($unit_name, $category_id, $address, $lessor_id, $available_for){
        $result = $this->connect()->prepare("INSERT INTO units (name, category_id, address, lessor_id, available_for) VALUES (?,?,?,?,?);");

        if(!$result->execute(array($unit_name, $category_id, $address, $lessor_id, $available_for))){
            $result = null;
            header("Location: ../profile.php?error=sqlfailede");
            exit();
        }

        $result = null;
    }

}
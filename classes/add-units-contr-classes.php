<?php

class AddunitsContr extends Addunits{

    private $property_name;
    private $category_id;
    private $region;
    private $province;
    private $city;
    private $barangay;
    private $postal;
    private $lessor_id;
    private $available_for;

    public function __construct($property_name, $category_id, $region, $province, $city, $barangay, $postal, $lessor_id, $available_for){
        $this->property_name = $property_name;
        $this->category_id = $category_id;
        $this->region = $region;
        $this->province = $province;
        $this->city = $city;
        $this->barangay = $barangay;
        $this->postal = $postal;
        $this->lessor_id = $lessor_id;
        $this->available_for = $available_for;
    }

    public function addUnits(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../units.php?error=emptyinput");
            exit();
        }

        $this->setUnits($this->property_name, $this->category_id, $this->region, $this->province, $this->city, $this->barangay, $this->postal, $this->lessor_id, $this->available_for);
    }

    private function emptyInput(){
        $result;
        if(empty($this->property_name) || empty($this->category_id) || empty($this->barangay) || empty($this->available_for)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

   
}
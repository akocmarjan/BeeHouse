<?php

class AddunitsContr extends Addunits{

    private $unit_name;
    private $category_id;
    private $address;
    private $lessor_id;
    private $available_for;

    public function __construct($unit_name, $category_id, $address, $lessor_id, $available_for){
        $this->unit_name = $unit_name;
        $this->category_id = $category_id;
        $this->address = $address;
        $this->lessor_id = $lessor_id;
        $this->available_for = $available_for;
    }

    public function addUnits(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../units.php?error=emptyinput");
            exit();
        }

        $this->setUnits($this->unit_name, $this->category_id, $this->address, $this->lessor_id, $this->available_for);
    }

    private function emptyInput(){
        $result;
        if(empty($this->unit_name) || empty($this->category_id) || empty($this->address) || empty($this->available_for)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

   
}
<?php

class UpdateContr extends Update{

    private $property_id;
    private $propertyName_updt;
    private $categoryID_updt;
    private $region_updt;
    private $province_updt;
    private $city_updt;
    private $barangay_updt;
    private $postal_updt;
    private $availableFor_updt;

    public function __construct($propertyName_updt, $categoryID_updt, $region_updt, $province_updt, $city_updt, $barangay_updt, $postal_updt, $availableFor_updt, $property_id){
        $this->propertyName_updt = $propertyName_updt;
        $this->categoryID_updt = $categoryID_updt;
        $this->region_updt = $region_updt;
        $this->province_updt = $province_updt;
        $this->city_updt = $city_updt;
        $this->barangay_updt = $barangay_updt;
        $this->postal_updt = $postal_updt;
        $this->availableFor_updt = $availableFor_updt;
        $this->property_id = $property_id;
    }

    public function updateProperty(){
        $this->setProperty($this->propertyName_updt, $this->categoryID_updt, $this->region_updt, $this->province_updt, $this->city_updt, $this->barangay_updt, $this->postal_updt, $this->availableFor_updt, $this->property_id);
    }


}
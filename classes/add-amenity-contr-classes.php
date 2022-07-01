<?php

class AddamenityContr extends Addamenity{

    private $amenity_category_id;
    private $rand_id;
    private $count;

    public function __construct($amenity_category_id, $rand_id, $count){
        $this->amenity_category_id = $amenity_category_id;
        $this->rand_id = $rand_id;
        $this->count = $count;
    }

    public function addAmenity(){
        $this->setAmenity($this->amenity_category_id, $this->rand_id, $this->count);
    }
}
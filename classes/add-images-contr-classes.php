<?php

class AddimagesContr extends Addimages{

    private $finalimg;
    private $creattime;
    private $property_id;

    public function __construct($finalimg, $creattime, $property_id){
        $this->finalimg = $finalimg;
        $this->creattime = $creattime;
        $this->property_id = $property_id;
    }

    public function addImages(){
        $this->setImages($this->finalimg, $this->creattime, $this->property_id);
    }
   
}
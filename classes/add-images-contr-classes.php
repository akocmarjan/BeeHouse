<?php

class AddimagesContr extends Addimages{

    private $finalimg;
    private $creattime;
    private $unit_id;

    public function __construct($finalimg, $creattime, $unit_id){
        $this->finalimg = $finalimg;
        $this->creattime = $creattime;
        $this->unit_id = $unit_id;
    }

    public function addImages(){
        $this->setImages($this->finalimg, $this->creattime, $this->unit_id);
    }
   
}
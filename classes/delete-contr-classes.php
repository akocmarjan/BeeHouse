<?php

class DeleteContr extends Delete{

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function deleteRoom(){
        $this->setRoom($this->id);
    }

    public function deleteProperty(){
        $this->setProperty($this->id);
    }

}
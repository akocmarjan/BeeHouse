<?php

class DeleteapplicationContr extends Deleteapplication{

    private $application_id;

    public function __construct($application_id){
        $this->application_id = $application_id;
    }

    public function deleteApplication(){
        $this->setApplication($this->application_id);
    }

}
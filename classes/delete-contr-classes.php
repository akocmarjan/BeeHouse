<?php

class DeleteContr extends Delete{

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function deleteRoom(){
        if($this->tenantEmptyCheck() == false){
            // echo "Room not empty!";
            $_SESSION['flash'] = "tenantnotempty";
            header("location: ../dashboard-partner-rooms.php?error=tenantnotempty");
            exit();
        }

        $this->setRoom($this->id);
    }

    public function deleteProperty(){
        if($this->roomEmptyCheck() == false){
            // echo "Room not empty!";
            $_SESSION['flash'] = "roomnotempty";
            header("location: ../dashboard-partner-property.php?error=roomnotempty");
            exit();
        }

        $this->setProperty($this->id);
    }

    public function deleteTenant(){
        $this->setTenant($this->id);
    }

    public function deleteImage(){
        $this->setImage($this->id);
    }

    private function roomEmptyCheck(){
        $result;
        if(!$this->checkIfRoomEmpty($this->id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function tenantEmptyCheck(){
        $result;
        if(!$this->checkIfTenantEmpty($this->id)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}
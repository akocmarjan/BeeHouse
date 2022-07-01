<?php
class Delete extends Dbh{

    protected function setRoom($id){
        $result = $this->connect()->prepare("DELETE FROM room WHERE id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function setProperty($id){
        $result = $this->connect()->prepare("DELETE FROM property WHERE id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function setTenant($id){
        $result = $this->connect()->prepare("DELETE FROM tenant WHERE id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function setImage($id){
        $result = $this->connect()->prepare("DELETE FROM unit_images WHERE property_id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function setAmenity($id){
        $result = $this->connect()->prepare("DELETE FROM amenity WHERE rand_id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function checkIfRoomEmpty($id){
        $result = $this->connect()->prepare("SELECT id FROM room WHERE property_id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("Location: ../index.php?error=sqlfailed");
            exit();
        }

       $resultCheck;
       if($result->rowCount() > 0){
           $resultCheck = false;
       }else{
           $resultCheck = true;
       }

       return $resultCheck;
    }

    protected function checkIfTenantEmpty($id){
        $result = $this->connect()->prepare("SELECT id FROM tenant WHERE room_id = ?;");

        if(!$result->execute(array($id))){
            $result = null;
            header("Location: ../index.php?error=sqlfailed");
            exit();
        }

       $resultCheck;
       if($result->rowCount() > 0){
           $resultCheck = false;
       }else{
           $resultCheck = true;
       }

       return $resultCheck;
    }

}
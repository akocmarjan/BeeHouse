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

}
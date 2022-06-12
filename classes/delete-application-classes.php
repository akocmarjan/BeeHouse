<?php
class Deleteapplication extends Dbh{

    protected function setApplication($application_id){
        $result = $this->connect()->prepare("DELETE FROM applicants WHERE id = ?;");

        if(!$result->execute(array($application_id))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

}
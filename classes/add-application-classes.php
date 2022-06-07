<?php
class Addapplication extends Dbh{

    protected function setApplication($room_id, $tenant_id){
        $result = $this->connect()->prepare("INSERT INTO applicants ( `room_id`, `tenant_id`) VALUES (?,?);");

        if(!$result->execute(array($room_id, $tenant_id))){
            $result = null;
            header("Location: ../rooms.php?error=sqlfailede");
            exit();
        }

        $result = null;
    }

}
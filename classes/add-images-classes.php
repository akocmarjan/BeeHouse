<?php
class Addimages extends Dbh{

    protected function setImages($finalimg, $creattime, $unit_id){
        $result = $this->connect()->prepare("INSERT INTO unit_images ( `image_name`, `image_createtime`,`unit_id`) VALUES (?,?,?);");

        if(!$result->execute(array($finalimg, $creattime, $unit_id))){
            $result = null;
            header("Location: ../rooms.php?error=sqlfailede");
            exit();
        }

        $result = null;
    }

}
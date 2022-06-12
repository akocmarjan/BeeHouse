<?php
class Addimages extends Dbh{

    protected function setImages($finalimg, $creattime, $property_id){
        $result = $this->connect()->prepare("INSERT INTO unit_images ( `image_name`, `image_createtime`,`property_id`) VALUES (?,?,?);");

        if(!$result->execute(array($finalimg, $creattime, $property_id))){
            $result = null;
            header("Location: ../rooms.php?error=sqlfailedeimage");
            exit();
        }

        $result = null;
    }

}
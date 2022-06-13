<?php
class Search extends Dbh{

    protected function setSearch($search_term){
        $result = $this->connect()->prepare("SELECT *
        FROM `property`
        WHERE (province LIKE'%?%')
          OR (city LIKE '%?%')
          OR (barangay LIKE '%?%')
          OR (property_name LIKE '%?%')
        ORDER BY `id` ASC;");

        if(!$result->execute(array($search_term))){
            $result = null;
            header("location: ../listing.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

}
<?php

class Dbh{
    public function connect(){
        try{
            $user = 'root';
            $password = '';
            $dbh = new PDO('mysql:host=localhost;dbname=beehouse', $user, $password);
            return $dbh;
        }catch(PDOException $e){
            print "Error: ". $e->getMessage() . "<br/>";
            die();
        }
    }
}
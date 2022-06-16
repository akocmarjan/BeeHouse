<?php
// "Driver={MySQL ODBC 8.0 UNICODE Driver};Server=MYSQL8002.site4now.net;
// Database=db_a881cd_mydb;
// Uid=a881cd_mydb;
// Password=YOUR_DB_PASSWORD"
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
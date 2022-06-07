<?php
class Signup extends Dbh{

    protected function setUser($username, $email, $firstname, $lastname, $phone, $hashed_password){
        $result = $this->connect()->prepare("INSERT INTO tenant (username, email, first_name, last_name, phone, password) VALUES (?,?,?,?,?,?);");

        if(!$result->execute(array($username, $email, $firstname, $lastname, $phone, $hashed_password))){
            $result = null;
            header("Location: ../index.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function checkUser($username, $email){
        $result = $this->connect()->prepare("SELECT username FROM tenant WHERE username = ? OR email = ?;");

        if(!$result->execute(array($username, $email))){
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
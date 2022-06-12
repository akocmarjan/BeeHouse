<?php
class Signup extends Dbh{

    protected function setUser($username, $email, $firstname, $lastname, $gender, $phone, $hashed_password){
        $result = $this->connect()->prepare("INSERT INTO user (username, email, first_name, last_name, gender, phone, password) VALUES (?,?,?,?,?,?,?);");

        if(!$result->execute(array($username, $email, $firstname, $lastname, $gender, $phone, $hashed_password))){
            $result = null;
            header("Location: ../signup-tenant.php?error=sqlfailed");
            exit();
        }

        $result = null;
    }

    protected function checkUser($username, $email){
        $result = $this->connect()->prepare("SELECT username FROM user WHERE username = ? OR email = ?;");

        if(!$result->execute(array($username, $email))){
            $result = null;
            header("Location: ../signup-tenant.php?error=sqlfailed");
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
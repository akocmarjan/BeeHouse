<?php
class Signin extends Dbh{

    protected function getUser($username, $password){
        $result = $this->connect()->prepare("SELECT password FROM tenant WHERE username = ? OR email = ?;");

        if(!$result->execute(array($username, $password))){
            $result = null;
            header("Location: ../index.php?error=sqlfailed");
            exit();
        }

        if($result->rowCount() == 0){
            $result = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $result->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["password"]);

        if($checkPwd == false){
            $result = null;
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $result = $this->connect()->prepare("SELECT * FROM tenant WHERE username = ? OR email = ? AND password = ?;");

            if(!$result->execute(array($username, $username, $password))){
                $result = null;
                header("Location: ../index.php?error=sqlfailed");
                exit();
            }

            if(!$result->execute(array($username, $email, $password))){
            $result = null;
            header("Location: ../index.php?error=sqlfailed");
            exit();
            }

            if($result->rowCount() == 0){
                $result = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $result->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userlogin'] = true;
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
        }

        $result = null;
    }

}
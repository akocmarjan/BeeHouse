<?php
class Signin extends Dbh{

    protected function getUser($username, $password){
        $result = $this->connect()->prepare("SELECT password FROM admin WHERE username = ?;");

        if(!$result->execute(array($username))){
            $result = null;
            header("Location: ../admin-index.php?error=sqlfailed");
            exit();
        }

        if($result->rowCount() == 0){
            $result = null;
            $_SESSION['signin'] = true;
            $_SESSION['flash'] = 'usernotfound';
            header("Location: ../admin-index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $result->fetchAll(PDO::FETCH_ASSOC);
        $pwdHash = password_hash($pwdHashed[0]["password"], PASSWORD_DEFAULT);
        $checkPwd = password_verify($password, $pwdHash);

        if($checkPwd == false){
            $result = null;
            $_SESSION['signin'] = true;
            $_SESSION['flash'] = 'wrongpassword';
            header("Location: ../admin-index.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $result = $this->connect()->prepare("SELECT * FROM admin WHERE username = ? AND password = ?;");

            if(!$result->execute(array($username, $password))){
                $result = null;
                header("Location: ../admin-index.php?error=asa");
                exit();
            }

            if($result->rowCount() == 0){
                $result = null;
                $_SESSION['signin'] = true;
                $_SESSION['flash'] = 'usernotfound';
                header("Location: ../admin-index.php?error=usernotfound");
                exit();
            }

            $user = $result->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['adminlogin'] = true;
            $_SESSION['adminid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
        }

        $result = null;
    }

}
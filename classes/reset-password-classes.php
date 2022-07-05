<?php
class resetPassword extends Dbh{

    protected function delpwdReset($email){
        $result = $this->connect()->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?;");

        if(!$result->execute(array($email))){
            $result = null;
            header("Location: ../index.php?error=sqlresetfailed");
            exit();
        }

        $result = null;
    }

    protected function inspwdReset($email, $selector, $token, $expires){
        $result = $this->connect()->prepare("INSERT INTO pwdReset (pwdResetEmail, pwdSelector, pwdToken, pwdExpires) VALUES(?,?,?,?);");

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        if(!$result->execute(array($email, $selector, $hashedToken, $expires))){
            $result = null;
            header("Location: ../index.php?error=sqlresetfailed");
            exit();
        }

        $result = null;
    }

    protected function checkpwdReset($email){
        $result = $this->connect()->prepare("SELECT * FROM user WHERE email=?;");

        if(!$result->execute(array($email))){
            $result = null;
            header("Location: ../index.php?error=sqlresetfailed");
            exit();
        }
        $username;
        if($result->rowCount() == 0){
            $result2 = $this->connect()->prepare("SELECT * FROM lessor WHERE email=?;");
            if(!$result2->execute(array($email))){
                $result2 = null;
                header("Location: ../index.php?error=sqlresetfailed");
                exit();
            }elseif($result2->rowCount() == 0){
                header("Location: ../forgot-password.php?error=usernotfound");
                exit();
            }else{
                $lessor = $result2->fetch(PDO::FETCH_ASSOC);
                $username = $lessor["username"];
                return $username;
            }
        }else{
            $user = $result->fetch(PDO::FETCH_ASSOC);
            $username = $user["username"];
            return $username;
        }

    }

    // protected function selUser($email){
    //     $result = $this->connect()->prepare("SELECT * FROM user WHERE email=?;");

    //     if(!$result->execute(array($email))){
    //         $result = null;
    //         header("Location: ../index.php?error=sqlresetfailed");
    //         exit();
    //     }

    //     if($result->rowCount() == 0){
    //         $result2 = $this->connect()->prepare("SELECT * FROM lessor WHERE email=?;");
    //         if(!$result2->execute(array($email))){
    //             $result2 = null;
    //             header("Location: ../index.php?error=sqlresetfailed");
    //             exit();
    //         }elseif($result2->rowCount() == 0){
    //             header("Location: ../forgot-password.php?error=usernotfound");
    //             exit();
    //         }
    //     }else{
    //         $user = $result->fetch(PDO::FETCH_ASSOC);
    //         $_SESSION['resetUsername'] = $user['username'];
    //         exit();
    //     }

    // }

    protected function selpwdReset($selector, $expires, $email, $token){
        $result = $this->connect()->prepare("SELECT * FROM pwdReset WHERE pwdSelector=? AND pwdExpires >=?;");

        if(!$result->execute(array($selector, $expires))){
            $result = null;
            header("Location: ../index.php?error=sqlresetfailed");
            exit();
        }

        if($result->rowCount() == 0){
            $result = null;
            header("Location: ../index.php?error=expired");
            exit();
        }else{
            $data = $result->fetch(PDO::FETCH_ASSOC);
            $tokenBin = hex2bin($email);
            $tokenCheck = password_verify($tokenBin, $data["pwdToken"]);

            if($tokenCheck == false){
                echo "Need to re-submit your reset request.";
                exit();
            }elseif($tokenCheck == true){
                $tokenEmail = $data["pwdResetEmail"];
                $sqlselectuser = $this->connect()->prepare("SELECT * FROM user WHERE email=?;");
                if(!$sqlselectuser->execute(array($tokenEmail))){
                    $sqlselectuser = null;
                    header("Location: ../index.php?error=sqlresetfailed");
                    exit();
                }elseif($sqlselectuser->rowCount() == 0){
                    $sqlselectlessor = $this->connect()->prepare("SELECT * FROM lessor WHERE email=?;");
                    if(!$sqlselectuser->execute(array($tokenEmail))){
                        $sqlselectuser = null;
                        header("Location: ../index.php?error=sqlresetfailed");
                        exit();
                    }else{
                        $hashedpassword = password_hash($token, PASSWORD_DEFAULT);
                        $sqlupdate = $this->connect()->prepare("UPDATE lessor SET password=? WHERE email=?;");
                        if(!$sqlupdate->execute(array($hashedpassword, $tokenEmail))){
                            $sqlupdate = null;
                            header("Location: ../index.php?error=sqlresetfailed");
                            exit();
                        }
                        $sqldelete = $this->connect()->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?;");
                        if(!$sqldelete->execute(array($tokenEmail))){
                            $sqldelete = null;
                            header("Location: ../index.php?error=sqlresetfailed");
                            exit();
                        }else{
                            header("Location: ../index.php?error=success");
                        }
                    }
                }else{
                    $hashedpassword = password_hash($token, PASSWORD_DEFAULT);
                    $sqlupdate = $this->connect()->prepare("UPDATE user SET password=? WHERE email=?;");
                    if(!$sqlupdate->execute(array($hashedpassword, $tokenEmail))){
                        $sqlupdate = null;
                        header("Location: ../index.php?error=sqlresetfailed");
                        exit();
                    }
                    $sqldelete = $this->connect()->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?;");
                    if(!$sqldelete->execute(array($tokenEmail))){
                        $sqldelete = null;
                        header("Location: ../index.php?error=sqlresetfailed");
                        exit();
                    }else{
                        header("Location: ../index.php?error=success");
                    }
                }
            }
        }

    }

    


}
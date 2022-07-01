<?php
session_start();
class SigninContr extends Signin{

    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function signinUser(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            $_SESSION['signin'] = true;
            $_SESSION['flash'] = 'emptyinput';
            header("location: ../admin-index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}
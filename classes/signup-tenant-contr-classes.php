<?php

class SignupContr extends Signup{

    private $email;
    private $username;
    private $firstname;
    private $lastname;
    private $phone;
    private $password;
    private $con_password;
    private $hashed_password;

    public function __construct($username, $email, $password, $con_password, $firstname, $lastname, $phone, $hashed_password){
        $this->username = $username;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->password = $password;
        $this->con_password = $con_password;
        $this->hashed_password =$hashed_password;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            // echo "Invalid username!";
            header("location: ../index.php?error=invalidUsername");
            exit();
        }
        if($this->invalidEmail() == false){
            // echo "Invalid email!";
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false){
            // echo "Password don't match!";
            header("location: ../index.php?error=passworddontMatch");
            exit();
        }
        if($this->usernameEmailTakenCheck() == false){
            // echo "Username or email already taken!";
            header("location: ../index.php?error=usernameEmailTakenCheck");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->firstname, $this->lastname, $this->phone, $this->hashed_password);
    }

    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->firstname) || empty($this->lastname) || empty($this->phone) || empty($this->password) || empty($this->con_password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result;
        if($this->password != $this->con_password){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function usernameEmailTakenCheck(){
        $result;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
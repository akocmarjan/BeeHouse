<?php
session_start();
class SignupContr extends Signup{

    private $email;
    private $username;
    private $firstname;
    private $lastname;
    private $gender;
    private $phone;
    private $password;
    private $con_password;
    private $hashed_password;

    public function __construct($username, $email, $password, $con_password, $firstname, $lastname, $gender, $phone, $hashed_password){
        $this->username = $username;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->password = $password;
        $this->con_password = $con_password;
        $this->hashed_password =$hashed_password;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            $_SESSION['flash'] = 'emptyinput';
            header("location: ../signup-tenant.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            $_SESSION['flash'] = 'invalidusername';
            // echo "Invalid username!";
            header("location: ../signup-tenant.php?error=invalidUsername");
            exit();
        }
        if($this->invalidEmail() == false){
            $_SESSION['flash'] = 'invalidemail';
            // echo "Invalid email!";
            header("location: ../signup-tenant.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false){
            $_SESSION['flash'] = 'passworddontmatch';
            // echo "Password don't match!";
            header("location: ../signup-tenant.php?error=passworddontMatch");
            exit();
        }
        if($this->usernameEmailTakenCheck() == false){
            $_SESSION['flash'] = 'emailusernametaken';
            // echo "Username or email already taken!";
            header("location: ../signup-tenant.php?error=usernameEmailTakenCheck");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->firstname, $this->lastname, $this->gender, $this->phone, $this->hashed_password);
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
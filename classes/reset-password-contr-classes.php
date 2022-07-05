<?php

class resetPasswordContr extends resetPassword{

    private $email;
    private $token;
    private $selector;
    private $expires;

    public function __construct($email, $token, $selector, $expires){
        $this->email = $email;
        $this->token = $token;
        $this->expires = $expires;
        $this->selector = $selector;

    }

    public function delpwd(){
        $this->delpwdReset($this->email);
    }

    public function inspwd(){
        $this->inspwdReset($this->email, $this->selector, $this->token, $this->expires);
    }

    public function checkpwd(){
        $result;
        $result = $this->checkpwdReset($this->email);
        return $result;
    }

    // public function seluser(){
    //     $this->selUser($this->email);
    // }

    public function selpwd(){
        $this->selpwdReset($this->selector, $this->expires, $this->email, $this->token);
    }
}
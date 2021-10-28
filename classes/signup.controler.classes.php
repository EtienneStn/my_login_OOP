<?php
class SignupControler {
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $passwordVerify;

    public function __construct($name, $surname, $username, $email, $password, $passwordVerify) {
        $this->$name = $name;
        $this->$surname = $surname;
        $this->$username = $username;
        $this->$email = $email;
        $this->$password = $password;
        $this->$passwordVerify = $passwordVerify;
    }

    private function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit
        }
        if($this->invalidUid() == false) {
            header("location: ../index.php?error=emptyinput");
            exit
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=emptyinput");
            exit
        }
        if($this->passwordMatch() == false) {
            header("location: ../index.php?error=emptyinput");
            exit
        }
    }
    private function emptyInput() {
        $result;
        if(empty($this->$name) || (empty($this->$surname) || (empty($this->$username) || (empty($this->$email) || (empty($this->$password) || (empty($this->$passwordVerify)) {
            $result = false;
        }
        else {
            $result = true;
        } 
    }

    private function invalidUid() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->$username)) {
            $result = false;
        }
        else {
            $result = true;
        } 
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this_>email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        } 
    }

    private function passwordMatch() {
        $result;
        if($password !== $passwordVerify) {
            $result = false;
        }
        else {
            $result = true;
        } 
    }

    private function passwordVerify() {
        $result;
        if($this->checkUser($this->$username, $this->$email)) {
            $result = false;
        }
        else {
            $result = true;
        } 
    }
}
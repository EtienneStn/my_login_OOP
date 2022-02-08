<?php
class SignupControler extends signup{
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $passwordVerify;

    public function __construct($name, $surname, $username, $email, $password, $passwordVerify) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordVerify = $passwordVerify;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            // echo "XXXXXXX"
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        if($this->invalidUid() == false) {
            header("location: ../signup.php?error=invalidUid");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false) {
            header("location: ../signup.php?error=pwdNotMatch");
            exit();
        }
        if($this->uidAlreadyTaken() == false) {
            header("location: ../signup.php?error=uidAlreadyTaken");
            exit();
        }
        $this->setUser($this->name, $this->surname, $this->username, $this->email, $this->password);
    }
    private function emptyInput() {
        if(empty($this->name) || empty($this->surname) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordVerify)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }

    private function invalidUid() {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    private function invalidEmail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    private function passwordMatch() {
        if($this->password !== $this->passwordVerify) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    private function uidAlreadyTaken() {
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }
}
<?php
class updateControler extends update{
    
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $passwordVerify;
    private $oldPassword;

    public function __construct($name, $surname, $username, $email, $password, $passwordVerify, $oldPassword) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordVerify = $passwordVerify;
        $this->oldPassword = $oldPassword;
    }

    public function updateUser() {
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
        if($this->emptyOldPassword() == false) {
            echo "You need to fill your password for any change !";
            exit();
        }
        $this->updateProfileUser($this->name, $this->surname, $this->username, $this->email,  $this->password, $this->oldPassword);
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

    private function passwordVerify() {
        if(!$this->checkPassword($this->oldPassword)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;  
    }

    private function emptyOldPassword() {
        if(empty($this->oldPassword)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }
}
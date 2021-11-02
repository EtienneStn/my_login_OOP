<?php
class SigninControler extends signin{
    
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function signinUser() {
        if($this->emptyInput() == false) {
            // echo "XXXXXXX"
            header("location: ../signin.php?error=emptyInput");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }
    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }
}
<?php
    if(isset($_POST['submit'])) {

        private $name = $_POST['name'];
        private $surname = $_POST['surname'];
        private $username = $_POST['username'];
        private $email = $_POST['email'];
        private $password = $_POST['password'];
        private $passwordVerify = $_POST['passwordVerify'];

        include "../classes/signup.classes.php";
        include "../classes/signup.controler.classes.php";
        $signup = new SignupControler($name, $surname, $username, $email, $password, $passwordVerify);
    }
<?php
    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordVerify = $_POST['passwordVerify'];

        include "../classes/db.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup.controler.classes.php";
        $signup = new SignupControler($name, $surname, $username, $email, $password, $passwordVerify);

        $signup->signupUser();
        header("location: ../index.php?success");
    }
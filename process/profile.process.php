<?php
    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordVerify = $_POST['passwordVerify'];
        $oldPassword = $_POST['oldPassword'];

        include "../classes/db.classes.php";
        include "../classes/profile.classes.php";
        include "../classes/profile.controler.classes.php";
        $update = new updateControler($name, $surname, $username, $email, $password, $passwordVerify, $oldPassword, $oldPassword);

        $update->updateUser();
        header("location: ../profile.php?success");
    }
<?php
    if(isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        include "../classes/db.classes.php";
        include "../classes/signin.classes.php";
        include "../classes/signin.controler.classes.php";
        $signin = new SigninControler($username, $password);

        $signin->signinUser();
        header("location: ../index.php?success");
    }
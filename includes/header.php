<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-1">
        <div class="container-fluid">
            <div class="row general-header">
                <div class="h1">
                    <h1>My LOGIN</h1>
                </div>
                <nav class="main-nav row">
                    <li><a href="index.php">Home</a></li>
                    <?php
                    if (isset($_SESSION["userUid"])) {
                    ?>
                        <li><a href="profile.php"><?php echo $_SESSION["userUid"]?></a></li>
                        <li><a href="process/logout.process.php">Log Out</a></li>
                    <?php
                    }
                    else {
                    ?>
                        <li><a href="signup.php">Sign up</a></li>
                        <li><a href="signin.php">Login</a></li>
                    <?php
                    }
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <main>
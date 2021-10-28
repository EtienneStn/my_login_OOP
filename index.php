<?php
require_once 'includes/header.php';
if (isset($_SESSION["useruid"])) {
    echo '<h3>Hello '.$_SESSION["useruid"].' !<h3>';
}
require_once 'includes/footer.php';
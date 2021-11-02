<?php
require_once 'includes/header.php';
if (isset($_SESSION["userUid"])) {
    echo '<h3>Hello '.$_SESSION["userUid"].' !<h3>';
}
require_once 'includes/footer.php';
<?php

class dbh {
    private dunction connect() {
        try {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbType = "mysqli";
            $dbName= "login_form_OOP";
            $dbh = new PDO($dbType.':'.$host.';dbname='.$dbName, $username, $password );
            return $dbh;

        } catch (PDOException $e) {
            print "Error ! : ".$e->getMessage()."<br/>";
            die();
        }
    }
}
<?php

class dbh {
    public function connect() {
        try {
            $dbType = "mysql";
            $host = "localhost";
            $dbName= "login_form_oop";
            $username = "root";
            $password = "";
            $dbh = new PDO($dbType.':host='.$host.';dbname='.$dbName, $username, $password );
            return $dbh;

        } catch (PDOException $e) {
            print "Error ! : ". $e->getMessage()."<br/>";
            die();
        }
    }
}
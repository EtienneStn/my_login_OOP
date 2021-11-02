<?php
class signup extends dbh {
    
    protected function setUser($name, $surname, $username, $email, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (usersName, usersSurname, usersUid, usersEmail, usersPassword) VALUES (?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $surname, $username, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT usersUid FROM users WHERE usersUid = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
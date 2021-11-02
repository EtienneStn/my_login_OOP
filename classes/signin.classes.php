<?php
class signin extends dbh {
    
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT usersPassword FROM users WHERE usersUid = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("location: ../signin.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../signin.php?error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["usersPassword"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../signin.php?error=userNotFound");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? AND usersPassword = ?;');

            if(!$stmt->execute(array($username, $username, $password))) {
                $stmt = null;
                header("location: ../signin.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../signin.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["usersId"];
            $_SESSION["userUid"] = $user[0]["usersUid"];

            $stmt = null;
        }
        
    }
}
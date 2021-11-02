<?php
class update extends dbh {
    
    protected function updateProfileUser($name, $surname, $username, $email, $password, $oldPassword) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../profile.php?error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["usersPassword"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../profile.php?error=userNotFound");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersPassword = ?;');

            if(!$stmt->execute(array($password))) {
                $stmt = null;
                header("location: ../profile.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../profile.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["usersId"];
            $_SESSION["userUid"] = $user[0]["usersUid"];

            $stmt = null;
        }
        
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

    protected function checkPassword($password) {
        $stmt = $this->connect()->prepare('SELECT usersPassword FROM users WHERE usersPassword = ?;');

        if(!$stmt->execute(array($password))) {
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
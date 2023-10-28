<?php

class Signup extends Dbh
{
    protected function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (users_uid,users_pwd,users_email)VALUES (?,?,?);");

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedpwd, $email))) {
            $stmt = null;
            header("Location:../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare("SELECT users_id FROM users Where users_uid = ? Or users_email=? ;");

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("Location:../index.php?error=stmtfailed");
            exit();
        }
        $resultCheak;
        if ($stmt->rowcount() > 0) {

            $resultCheak = False;
        } else {
            $resultCheak = True;
        }

        return $resultCheak;
    }
}

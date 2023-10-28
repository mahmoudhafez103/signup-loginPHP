<?php

class Login extends Dbh
{
    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare("SELECT users_pwd from users where users_uid = ? or users_email = ? ;");


        if (!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            header("Location:../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {

            $stmt = null;
            header("Location:../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["users_pwd"];
        $checkpwd = password_verify($pwd, $pwdHashed);

        if ($checkpwd == false) {

            $stmt = null;
            header("Location:../index.php?error=wrongpassword");
            exit();
        } elseif ($checkpwd == true) {
            $stmt = $this->connect()->prepare("SELECT * from users where users_uid = ? or users_email = ? and users_pwd = ?;");


            if (!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("Location:../index.php?error=stmtfailed");
                exit();
            }


            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $stmt = null;
        }
        $stmt = null;
    }
}

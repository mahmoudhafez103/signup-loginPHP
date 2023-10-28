<?php

class loginContr extends Login
{
    private $uid;
    private $pwd;


    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }


    public function LoginUser()
    {

        if ($this->emptyInput() == false) {

            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invaldUid() == false) {

            header("location: ../index.php?error=invaldusername");
            exit();
        }



        $this->getUser($this->uid, $this->pwd);
    }
    private function emptyInput()
    {
        $result;
        if (empty($this->uid) || empty($this->pwd)) {

            $result = False;
        } else {
            $result = True;
        }
        return $result;
    }

    private function invaldUid()
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {

            $result = True;
        } else {
            $result = True;
        }
        return $result;
    }
}

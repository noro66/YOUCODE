<?php


class loginpCntrl extends login {

    private $user_uid;
    private $pwd;

    public function __construct($user_uid, $pwd)
    {   
        $this->user_uid = $user_uid;
        $this->pwd = $pwd;
        
    }

    public function loginUser()
    {
       if ($this->emptyInput() == false) {
        header("location: ../index.php?error=emptyinput");
        exit();
       }
       $this->getUser($this->user_uid, $this->pwd);
    }

    private function emptyInput()
    {
        if (empty($this->user_uid)||empty($this->pwd)) {
            return false;
        }else {
            return true;
        }
    }

   
}
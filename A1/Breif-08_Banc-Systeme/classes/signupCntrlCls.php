<?php

class SignupCntrl extends Signup
{

    private $user_uid;
    private $pwd;
    private $pwdrpt;
    private $email;

    public function __construct($user_uid, $pwd, $pwdrpt, $email)
    {
        $this->user_uid = $user_uid;
        $this->pwd = $pwd;
        $this->pwdrpt = $pwdrpt;
        $this->email = $email;
    }

    public function singnupUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../veiw/signup.php?error=emptyinput");
            exit();
        }

        if ($this->invalidUid() == false) {
            header("location: ../veiw/signup.php?error=invaliduid");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../veiw/signup.php?error=invalidemail");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../veiw/signup.php?error=uidtaken");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../veiw/signup.php?error=pwdnotmatch");
            exit();
        }

        $this->setUser($this->user_uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        if (empty($this->user_uid) || empty($this->pwd) || empty($this->pwdrpt) || empty($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    private function  invalidUid()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->user_uid)) {
            return false;
        } else {
            return true;
        }
    }

    private function  invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    private function  pwdMatch()
    {
        if ($this->pwd !== $this->pwdrpt) {
            return false;
        } else {
            return true;
        }
    }

    private function  uidTakenCheck()
    {
        if (!$this->checkuser($this->user_uid, $this->email)) {
            return false;
        } else {
            return true;
        }
    }
}

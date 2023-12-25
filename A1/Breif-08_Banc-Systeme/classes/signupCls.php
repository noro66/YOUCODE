<?php

class Signup extends DbCls
{



    protected function setUser($uid, $pwd,  $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid,  users_pwd, users_email)
                                            VALUES (?, ?, ?);');

        $hspwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute([$uid, $hspwd, $email])) {
            $stmt = null;
            header("location: ../veiw/signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function checkuser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ?');
        if (!$stmt->execute([$uid, $email])) {
            $stmt = null;
            header("location: ../veiw/signup.php?error=stmtfailed");
            exit();
        } elseif ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
}

<?php
session_start();

class login extends DbCls
{



    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? ;');

        if (!$stmt->execute([$uid, $uid])) {
            $stmt = null;
            header("location: ../veiw/login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../veiw/login.php?error=invalidusename");
            exit();
        }

        $row = $stmt->fetch();

        if (password_verify($pwd, $row["users_pwd"])) {
            $_SESSION['userid'] = $row['users_id'];
            $_SESSION['useruid'] = $row['users_uid'];
            $stmt = null;
            header("location: ../veiw/login.php?error=none&user=' . $uid . '");
            exit();
        } else {
            $stmt = null;
            session_unset();
            session_destroy();
            header("location: ../veiw/login.php?error=wrongpassword!");
            exit();
        }
    }
}

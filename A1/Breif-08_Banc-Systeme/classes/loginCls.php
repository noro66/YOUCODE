<?php
session_start();

class login extends DbCls
{



    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? ;');

        if (!$stmt->execute([$uid, $uid])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=invalidusename");
            exit();
        }

        $rows = $stmt->fetchAll();
        if ($rows) {
            foreach ($rows as $row) {
                if (password_verify($pwd, $row["users_pwd"])) {
                    $_SESSION['userid'] = $row['users_id'];
                    $_SESSION['useruid'] = $row['users_uid'];
                    $stmt = null;
                    header("location: ../index.php?error=none&user=' . $uid . '");
                    exit();
                }
            }

            $stmt = null;
            session_unset();
            session_destroy();
            header("location: ../index.php?error=wrongpassword!");
            exit();
        }
    }
}

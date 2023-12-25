<?php

class Users extends DbCls
{
    protected function getUser($firstname)
    {
        $sql = "SELECT * FROM users WHERE users_fname = ? ;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname]);
        $results = $stmt->fetchAll();

        return $results;
    }
    protected function setUser($firstname, $lastname, $dob)
    {
        $sql = "INSERT INTO users ( users_fname, users_lname,	users_dob)
                VALUES (?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $dob]);
    }
}

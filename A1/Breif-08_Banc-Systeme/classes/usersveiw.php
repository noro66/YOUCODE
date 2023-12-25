<?php

class UsersVeiw extends Users {
    public function showUsers($name){
        $results = $this->getUser($name);
        echo "Full name:   " . $results[0]['users_fname']. "  " . $results[0]['users_lname']  . "<br>";
        echo "Date of birth:  " . $results[0]['users_dob'] . "<br>";

    }
}
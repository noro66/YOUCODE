<?php

class DbCls {
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $pdo = new PDO('mysql:host=localhost;dbname=testData',$username, $password);
            return $pdo;
        } catch (PDOException $e) {
            print 'Error! :  ' . $e->getMessage() . '<br/>';
        }
    }

}
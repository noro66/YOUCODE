<?php
include 'config.php';;


trait Connection {

    protected function connect()
    {

        try {
            
        return new PDO('mysl:host=localhost;dbname=assurance','root','Password123@');
             
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
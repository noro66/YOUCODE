<?php
// $config = require 'config.php';

trait Connection {

    protected function connect($config)
    {

        try {
            return new PDO('mysl:host='.$config['DB_HOST']. ';dbname'. $config['DB_NAME'],
             $config['DB_USER'],
             $config['DB_PASSWORD']);
             
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
<?php


trait Connection {
    public function connect() {

        try {
            return new PDO('mysql:host=localhost;dbname=assurance', 'root', 'Password123@');
        } catch (PDOException $e) {
            echo "The data is not connected: " . $e->getMessage();
        }
    }
} 
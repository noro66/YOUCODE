<?php

trait Database
{
    protected $dsn = "mysql:host=localhost;dbname=datatest";
    protected $user = 'root';
    protected $pass = '';
    protected $pdo;

    public function connect()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            // Log the error instead of echoing it
            error_log("Database Connection Error: " . $e->getMessage());
            return false;
        }
    }
}

<?php


trait Database
{
    private $dsn = "mysql:host=localhost;dbname=datatest";
    private $user = 'root';
    private $pass = '';
    private $pdo;


    public function connect()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Error :  " . $e->getMessage();
            return false;
        }
    }
}








// $do = new Database();
// $row = $do->getUserById(25);
// print_r($row);
// $do->insert('mohamed', 'ohmo', 'moha@gmail.com', '9878676598');
// echo "<pre>";
// print_r($do->read());
// echo "<pre>";

// echo "<br>";
// echo $do->totalRowcount();

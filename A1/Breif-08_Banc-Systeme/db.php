<?php


class Database
{
    private $dsn = "mysql:host=localhost;dbname=Datatest";
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

    public function insert($fname, $lname, $email, $phone)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, phone) 
                VALUES (:fname, :lname, :email, :phone";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'phone' => $phone]);
        return TRUE;
    }

    public function read()
    {
        $sql = "SELECT * FROM users";
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

$do = new Database();
echo "<pre>";
print_r($do->read());
echo "<pre>";

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

    public function getUserById($id)
    {


        try {
            $sql = " SELECT * FROM users WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function update($id, $fname, $lname, $email, $phone)
    {
        try {
            $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id, 'fname' => $fname, 'lname' => $lname, 'email' => $email, 'phone' => $phone]);
            return true;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
    public function totalRowcount()
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();
            return $t_rows;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
}


$do = new Database();
echo "<pre>";
print_r($do->read());
echo "<pre>";

echo "<br>";
echo $do->totalRowcount();

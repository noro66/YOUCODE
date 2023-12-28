<?php
require_once("ClientServicesInterface.php");
require_once("../model/clientCls.php");
require_once("../model/database/connection.php");

class ClientServices implements ClientServicesInterface{
    use Connection;

    protected $db;
    public function addClient(Client $client){
        $db = $this->connect();

        $first_name = $client->getUsername();
        $last_name = $client->getLast_name();
        $adress = $client->getAdress();
        $Phone = $client->getPhone();

        $query = "INSERT INTO clients (first_name,last_name,adress,phone) VALUES (:first_name,:last_name,:adress,:Phone)";
        $result = $db->prepare($query);
        $result->bindparam(":first_name", $first_name);
        $result->bindparam(":last_name", $last_name);
        $result->bindparam(":adress", $adress);
        $result->bindparam(":Phone", $Phone);
        $result->execute();
        // $id = $db->lastInsertId();
        // return $id;
    }



public function ShowClient(){
    $db = $this->connect();
    $query = "SELECT * FROM client ORDER BY  id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $clients = array(); 
    foreach($fetching as $row){
        $clients[] = new client($row["id"], $row["first_name"], $row["last_name"], $row["Adress"], $row["phone"]);
    }
    return $clients;
}

public function ShowfiltredClient($id){
    $db = $this->connect();
    $query = "SELECT client.id, client.first_name FROM client
    JOIN assurclient ON assurclient.id = client.id
    WHERE assurclient.Assurance_ID = $id
    ORDER BY id DESC";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $fetching;
}

    
    public function getUserById($id){
       

        $db = $this->connect();
            $clientInfo = "SELECT * FROM client WHERE id = $id";
            $getClient = $db->query($clientInfo);
            $result = $getClient->fetch(PDO::FETCH_ASSOC);
        
            return $result;
    
}

    public function UpdateClient(Client $client,$id){
        $db = $this->connect();
        $first_name = $client->getUsername();
        $last_name = $client->getLast_name();
        $adress = $client->getAdress();
        $Phone = $client->getPhone();
        $query  = "UPDATE client SET first_name=:first_name , last_name=:last_name , Adress=:adress, phone=:Phone WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);
        $stmt->bindParam(":adress", $adress, PDO::PARAM_STR);
        $stmt->bindParam(":Phone", $Phone, PDO::PARAM_STR);
        $stmt->execute();

    }
    public function DeleteClient($id){
        $db = $this->connect();

        $query = "DELETE FROM client WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

      public function totalRowcount()
    {
        $db = $this->connect();
        
        try {
            $sql = "SELECT * FROM users";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();
            return $t_rows;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

}
?>
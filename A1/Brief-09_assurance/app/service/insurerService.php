<?php
require_once("insurerServiceInterface.php");
require_once("../model/insurerCls.php");
require_once("../model/database/connection.php");
class InsurerService implements InsurerServiceinterface{
    
    use Connection;
    protected $db;
    
    public function addInsurer(Insurer $Insurer){
        $db = $this->connect();

        $name = $Insurer->getName();
        $address = $Insurer->getAddress();
        

        $query = "INSERT INTO insurer (name,address) VALUES (:name,:address)";
        $result = $db->prepare($query);
        $result->bindparam(":name", $name);
        $result->bindparam(":address", $address);
   
        $result->execute();
    }





public function ShowInsurer(){

    try {
        $db = $this->connect();
    $query = "SELECT * FROM insurer";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Insurers = array(); 
    foreach($fetching as $row){
        $Insurers[] = new Insurer($row["id"], $row["name"], $row["address"]);
    }
    return $Insurers;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}

public function ShowInsurer1(){

    try {
        $db = $this->connect();
    $query = "SELECT * FROM insurer";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Insurers = array(); 
    foreach($fetching as $row){
        $ins = new Insurer($row["id"], $row["name"], $row["address"]);
        $Insurers[] = [$ins->getId(),$ins->getName()];
    }
    return $Insurers;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}


    
    public function getInsurerById($id){
       

        $db = $this->connect();
            $InsurerInfo = "SELECT * FROM insurer WHERE id  = $id";
            $getInsurer = $db->query($InsurerInfo);
            $result = $getInsurer->fetch(PDO::FETCH_ASSOC);
        
            $address = $result["address"];
            $name = $result["name"];  
            $id = $result["id"];        

            return [$id, $name, $address];
    
}


    public function UpdateInsurer(Insurer $Insurer,$id){

try {
    $db = $this->connect();
        
    $name = $Insurer->getName();
    $address = $Insurer->getAddress();
  
    $query  = "UPDATE insurer SET name=:name , address=:address  WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":address", $address, PDO::PARAM_STR);

    $stmt->execute();
} catch (PDOException $e) {
    echo "Error " . $e->getMessage(); 
}

    }
    public function DeleteInsurer($id){
        $db = $this->connect();

        $query = "DELETE FROM insurer WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>
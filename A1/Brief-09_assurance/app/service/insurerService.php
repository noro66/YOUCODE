<?php
require_once("insurerServiceInterface.php");
require_once("../model/insurerCls.php");
require_once("../model/database/connection.php");
class InsurerService implements InsurerServiceinterface{
    
    use Connection;
    protected $db;
    
    public function addInsurer(Insurer $Insurer){
        $db = $this->connect();

        $name = $Insurer->getInsurerName();
        $adrees = $Insurer->getInsurerAdreadress();
        

        $query = "INSERT INTO Insurer (name,adrees) VALUES (:name,:adrees)";
        $result = $db->prepare($query);
        $result->bindparam(":name", $name);
        $result->bindparam(":adrees", $adrees);
   
        $result->execute();
    }





public function ShowInsurer(){
    $db = $this->connect();
    $query = "SELECT * FROM Insurer ORDER BY  id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Insurers = array(); 
    foreach($fetching as $row){
        $Insurers[] = new Insurer($row["id"], $row["name"], $row["adrees"]);
    }
    return $Insurers;
}


    
    public function editingInsurer($id){
       

        $db = $this->connect();
            $InsurerInfo = "SELECT * FROM Insurer WHERE id  = $id";
            $getInsurer = $db->query($InsurerInfo);
            $result = $getInsurer->fetch(PDO::FETCH_ASSOC);
        
            $adrees = $result["adrees"];
            $name = $result["name"];
         

        
            return [$name, $adrees];
    
}


    public function UpdateInsurer(Insurer $Insurer,$id){
        $db = $this->connect();
        $name = $Insurer->getInsurername();
        $adrees = $Insurer->getInsurerAdreadress();
      
        $query  = "UPDATE insurer SET name=:name , adrees=:adrees  WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":adrees", $adrees, PDO::PARAM_STR);

        $stmt->execute();

    }
    public function DeleteInsurer($id){
        $db = $this->connect();

        $query = "DELETE FROM Insurer WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>
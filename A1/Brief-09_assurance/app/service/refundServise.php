<?php
require_once("refundServiceInterface.php");
require_once("../model/refundsCls.php");
require_once("../model/database/connection.php");
class RefundServices  implements RefundServiceInterface{
    
    use Connection;
    protected $db;
    public function addRefund(Refund $Refund){
        $db = $this->connect();
    
        $Amount = $Refund->getAmount();
        $Claim_ID = $Refund->getClaim_ID();
        $DateRefund = $Refund->getDate();
    
        $query = "INSERT INTO Refund ( amount, date,claim_ID) VALUES ( :Amount, :Date,:Claim_ID )";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Amount", $Amount);
            $result->bindParam(":Date", $DateRefund);
            $result->bindParam(":Claim_ID", $Claim_ID);
            
            
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    



    public function ShowRefund(){
    $db = $this->connect();
    $query = "SELECT * FROM Refund ORDER BY  id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Refund = array(); 
    foreach($fetching as $row){
        $Refund[] = new Refund($row["id"], $row["amount"],$row["date"],$row["claim_ID"]);
    }
    return $Refund;
}



public function editingRefund($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT amount FROM refund WHERE id = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $Amount = $result["amount"];
            

        
            return [$Amount];
    
}

public function UpdateRefund(Refund $Refund,$id)
{
    try {
        $db = $this->connect();
        $Amount = $Refund->getAmount();
        $Date = $Refund->getDate();

    $query = "UPDATE refund SET  amount=:Amount ,date=:Date WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
    $stmt->bindParam(":Amount", $Amount, PDO::PARAM_STR);
    $stmt->bindParam(":Date", $Date, PDO::PARAM_STR);
    $stmt->execute();
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function DeleteRefund($id){
        $db = $this->connect();

        $query = "DELETE FROM refund WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>
<?php
require_once("ClaimServiceInterface.php");
require_once("../model/claimsCls.php");
require_once("../model/database/connection.php");

class ClaimServices  implements ClaimServiceInterface{
    use Connection;
    protected $db;
    public function addClaim(Claim $claim){
        $db = $this->connect();
    
        $Description = $claim->getDescreption();
        $Article_ID = $claim->getArticle_ID();
        $DateClaim = $claim->getDate();
    
        $query = "INSERT INTO claim ( Descreption, Date,Article_ID) VALUES ( :Descreption, :Date,:Article_ID )";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Descreption", $Description);
            $result->bindParam(":Date", $DateClaim);

            $result->bindParam(":Article_ID", $Article_ID);
            
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
public function ShowClaim(){
    $db = $this->connect();
    $query = "SELECT * FROM claim ORDER BY  Claim_ID DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Claim = array(); 
    foreach($fetching as $row){
        $Claim[] = new Claim($row["id"], $row["name"], $row["descreption"],$row["date"],$row["article_id"]);
    }
    return $Claim;
}



    public function editingClaim($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT Descreption FROM Claim WHERE Claim_ID = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $description = $result["Descreption"];
            

        
            return [$description];
    
}

public function UpdateClaim(Claim $claim, $id)
{
    try {
        $db = $this->connect();
        $Descreption = $claim->getDescreption();
        $Date = $claim->getDate();

    $query = "UPDATE claim SET  Descreption=:Descreption ,Date=:Date WHERE Claim_ID = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
    $stmt->bindParam(":Descreption", $Descreption, PDO::PARAM_STR);
    $stmt->bindParam(":Date", $Date, PDO::PARAM_STR);
    $stmt->execute();
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

    public function DeleteClaim($id){
        $db = $this->connect();

        $query = "DELETE FROM claim WHERE Claim_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>
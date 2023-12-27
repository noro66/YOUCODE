<?php
require_once("articleServiceInrerface.php");
require_once("../model/articleCls.php");
require_once("../model/database/connection.php");
class ArticleService  implements ArticleServiceInterface{
    use connection;
    protected $db;
    public function addArticle(Article $article){
        $db = $this->connect();
    
        $Title = $article->getTitle();
        $Description = $article->getDescription();
        $userId = $article->getClient_id();
        $Assurance_ID = $article->getInsurer_id();
        $Date = $article->getId();
    
        $query = "INSERT INTO article (title, description, Date,client_id, insurer_id) VALUES (:Title, :Description, :Date,:userId, :Assurance_ID)";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Title", $Title);
            $result->bindParam(":Description", $Description);
            $result->bindParam(":Date", $Date);

            $result->bindParam(":userId", $userId);
            $result->bindParam(":Assurance_ID", $Assurance_ID);
            
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    



public function ShowArticle(){
    $db = $this->connect();
    $query = "SELECT * FROM article ORDER BY  id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Article = array(); 
    foreach($fetching as $row){
        $Article[] = new Article($row["id"], $row["Title"],$row["description"],$row["date"], $row["client_id"],$row['insurer']);
    }
    return $Article;
}



    public function editingArticle($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT title , description FROM article WHERE id = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $Title = $result["title"];
            $description = $result["description"];
            

        
            return [$Title,$description];
    
}

public function UpdateArticle(Article $article, $id)
{
    try {
        $db = $this->connect();
        $Title = $article->getTitle();
        $description = $article->getDescription();
    $Date = $article->getId();

    $query = "UPDATE article SET title=:Title, description=:Description ,date=:Date WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":Title", $Title, PDO::PARAM_STR);
    $stmt->bindParam(":Description", $description, PDO::PARAM_STR);
    $stmt->bindParam("Date", $Date, PDO::PARAM_STR);
    $stmt->execute();
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

    public function DeleteArticle($id){
        $db = $this->connect();

        $query = "DELETE FROM article WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>
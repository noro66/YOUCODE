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
        $content = $article->getcontent();
        $userId = $article->getClient_id();
        $Assurance_ID = $article->getInsurer_id();
        $Date = $article->getId();
    
        $query = "INSERT INTO article (title, content, Date,client_id, insurer_id) VALUES (:Title, :content, :Date,:userId, :Assurance_ID)";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Title", $Title);
            $result->bindParam(":content", $content);
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
        $Article[] = new Article($row["id"], $row["Title"],$row["content"],$row["date"], $row["client_id"],$row['insurer']);
    }
    return $Article;
    }



    public function getArticleById($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT title , content FROM article WHERE id = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $Title = $result["title"];
            $content = $result["content"];
            

        
            return [$Title,$content];
    
    }

    public function UpdateArticle(Article $article, $id)
    {
    try {
        $db = $this->connect();
        $Title = $article->getTitle();
        $content = $article->getcontent();
    $Date = $article->getId();

    $query = "UPDATE article SET title=:Title, content=:content ,date=:Date WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":Title", $Title, PDO::PARAM_STR);
    $stmt->bindParam(":content", $content, PDO::PARAM_STR);
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
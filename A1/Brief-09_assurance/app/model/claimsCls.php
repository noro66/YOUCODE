<?php



Class Claim{




    private $id;
    private $name;
    private $descreption;

    private $date;
    
    private $article_id;
    
    public function __construct($id, $name, $descreption,$date, $article_id){
      
      $this->id = $id;
      $this->name = $name;
      $this->descreption = $descreption;
      $this->date = $date;
      $this->article_id = $article_id;
          
    }
    
    
 
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->descreption = $name;
    }


    public function getDescreption(){
        return $this->descreption;
    }
    public function setDescreption($descreption){
        $this->descreption = $descreption;
    }
   
 
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        return $this->date = $date;
    }

    public function getArticle_id(){
        return $this->article_id;
    }
   


}



?>
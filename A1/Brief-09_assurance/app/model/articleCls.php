<?php



Class Article{


    private $id;
    private $title;
    private $description;
    private $date;
    private $client_id;
    private $insurer_id;

    



    public function __construct($id,$title,$description,$date,$client_id, $insurer_id){
        $this->title= $title;
        $this->description = $description ;
        $this->client_id = $client_id ;
        $this->insurer_id = $insurer_id ;
        $this->date = $date;
        $this->id = $id;
        


    }




    public function getId(){
        return $this->id;
    }
    
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getClient_id(){
        return $this->client_id;
    }
    public function getInsurer_id(){
        return $this->insurer_id;
    }
   
    }
    

?>
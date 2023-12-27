<?php



Class Article{


    private $id;
    private $Title;
    private $content;
    private $date;
    private $client_id;
    private $insurer_id;

    



    public function __construct($id,$Title,$content,$date,$client_id, $insurer_id){
        $this->Title= $Title;
        $this->content = $content ;
        $this->client_id = $client_id ;
        $this->insurer_id = $insurer_id ;
        $this->date = $date;
        $this->id = $id;
        


    }




    public function getid(){
        return $this->id;
    }
    
    public function getTitle(){
        return $this->Title;
    }
    public function setTitle($Title){
        $this->Title = $Title;
    }
    public function getcontent(){
        return $this->content;
    }
    public function setcontent($content){
        $this->content = $content;
    }
    public function getdateDate(){
        return $this->date;
    }
    public function setdateDate($date){
        $this->date = $date;
    }
    public function getclient_id(){
        return $this->client_id;
    }
    public function getinsurer_id(){
        return $this->insurer_id;
    }
   
    }
    

?>
<?php



Class Refund{



    private $id;
    private $amount;
    private $date;
    private $claim_id;
    
    public function __construct($amount,$date, $claim_id){
    
      $this->amount = $amount;
      $this->date = $date;
      $this->$claim_id = $$claim_id;
      
    }
    
    
    public function getid(){
        return $this->id;
    }

    public function getAmount(){
        return $this->amount;
    }
    public function setAmount($amount){
        $this->amount = $amount;
    }
   
 
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        return $this->date = $date;
    }

  
    public function getClaim_id(){
        return $this->claim_id;
    }
}



?>
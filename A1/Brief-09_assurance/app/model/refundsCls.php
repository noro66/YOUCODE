<?php



Class Prime{



    private $id;
    private $amount;
    private $date;
    private $claim_ID;
    
    public function __construct($amount,$date, $claim_ID){
    
      $this->amount = $amount;
      $this->date = $date;
      $this->claim_ID = $claim_ID;
      
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

  
    public function getClaim_ID(){
        return $this->claim_ID;
    }
}



?>
<?php


Class Client{


    private $id;
    private $first_name;
    private $last_name;
    private $phone;
    private $adress;

    
    public function __construct($first_name,$last_name,$adress,$phone){
        $this->first_name= $first_name;
        $this->last_name = $last_name ;
        $this->adress = $adress;
        $this->phone = $phone ;
    }



    public function getId(){
        return $this->id;
    }
    
    public function getUsername(){
        return $this->first_name;
    }
    public function setUsername($first_name){
        $this->first_name = $first_name;
    }
    public function getLast_name(){
        return $this->last_name;
    }
    public function setLast_name($last_name){
        $this->last_name = $last_name;
    }
   
 
    public function getAdress(){
        return $this->adress;
    }
    public function setAdress($adress){
        return $this->adress = $adress;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
}



?>
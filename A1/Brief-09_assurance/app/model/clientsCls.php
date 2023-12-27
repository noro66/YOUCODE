<?php


Class Client{


    private $id;
    private $first_name;
    private $last_name;
    private $phone;
    private $adress;

    private $Number;
    
    public function __construct($id,$first_name,$last_name,$adress,$phone){
        $this->first_name= $first_name;
        $this->last_name = $last_name ;
        $this->adress = $adress;
        $this->phone = $phone ;
        $this->id = $id;
    }



    public function getid(){
        return $this->id;
    }
    
    public function getusername(){
        return $this->first_name;
    }
    public function setusername($first_name){
        $this->first_name = $first_name;
    }
    public function getlast_name(){
        return $this->last_name;
    }
    public function setlast_name($last_name){
        $this->last_name = $last_name;
    }
   
 
    public function getadress(){
        return $this->adress;
    }
    public function setadress($adress){
        return $this->adress = $adress;
    }

    public function getphone(){
        return $this->phone;
    }
    public function setphone($phone){
        $this->phone = $phone;
    }
}



?>
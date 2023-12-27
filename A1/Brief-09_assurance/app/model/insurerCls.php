<?php



Class Insurer{


private $id;
private $name;
private $adress;

public function __construct($id,$name,$adress){
    $this->$id = $id;
    $this->name= $name;
    $this->adress = $adress ;
   

}


public function getInsurerd(){
    return $this->id;
}

public function getInsurerName(){
    return $this->name;
}

public function setInsurerName($name){
    $this->name = $name;
}

public function getInsurerAdreadress(){
    return $this->adress;
}

public function setInsurerAdreadress($adress){
    $this->adress = $adress;
}


}


?>
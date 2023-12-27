<?php



Class Assurance{


private $id;
private $name;
private $adress;

public function __construct($id,$name,$adress){
    $this->$id = $id;
    $this->name= $name;
    $this->adress = $adress ;
   

}


public function getAssuranceId($id){
    return $this->$id;
}

public function getAssuranceName($name){
    return $this->name;
}

public function setAssuranceName($name){
    $this->name = $name;
}

public function getadreadress($adress){
    return $this->$adress;
}

public function setadreAdress($adress){
    $this->$adress = $adress;
}


}


?>
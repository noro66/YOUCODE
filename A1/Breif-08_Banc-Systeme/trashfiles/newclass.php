<?php

class NewClass {
public $moby = 'this is moby ! ';
private $name;
private $age;
private $color;
private $type;

public static $priyerAge = 7;

public static function setaPrage($pAg)
{
    self::$priyerAge = $pAg;
}


public function getage()
{
    return self::$priyerAge;
}
public function __construct($name, $age, $color,$type)
{
    $this->name = $name;
    $this->age = $age;
    $this->color = $color;
    $this->type = $type;
}

public function owner(){
return "hello, this is moby" ;
}



public function setCaracter($name, $age, $color,$type)
{
    $this->name = $name;
    $this->age = $age;
    $this->color = $color;
}

public function getCaracter()
{
    $caracter = [$this->name, $this->age, $this->color, $this->type];
   return $caracter;
}

public function __destruct()
{
echo "<br> This is Tthe End of The Class YOPPY!";

} 


}

$object = new NewClass('3abdo', 25, 'yellow', 'human');

echo $object->owner();
echo "<br>";
echo "<pre>";
// $object->setCaracter('moha', 23, 'brown');
$caracter = $object->getCaracter();
var_dump($caracter);
echo "</pre>";

// $object->priyerAge = 12;  this is wrong !!!!
 echo "The minimum age to start praying in islam : " . $object::$priyerAge . "<br>";
 $object::setaPrage(10);
 echo "The minimum age to start praying in islam : " . $object::$priyerAge . "<br>";
 $object::setaPrage(7);
 echo "The minimum age to start praying in islam : " . $object::$priyerAge . "<br>";
 
echo "we envoque the normal function to see a statick propreites" .  $object->getage();
// unset($object);

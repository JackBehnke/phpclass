<?php

namespace oop;

class Car
{
public $make;
public $model;
public $year;
public $color;
public $status;

public function __construct(){
    echo "new car created!";
    $this->park();
}

public function print(){
    echo "This Car is $this->color, and is $this->status.";
}
public function forward(){
    $this->status = "Moving Forward";
}
public function park(){
    $this->status = "parked";
}

}


$jackcar = new Car();
$jackcar->color = "Black";
$jackcar->forward();

$ryanCar = new Car();
$ryanCar->color = "white";
$ryanCar->park();

$michealCar = new Car();
$michealCar->color = "blue";

$ryanCar->print();
$jackcar->print();
$michealCar->print();

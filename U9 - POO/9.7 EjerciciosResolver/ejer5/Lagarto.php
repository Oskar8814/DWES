<?php
class Lagarto extends Animal
{
    //constructor
    public function __construct($nombre,$edad,$sexo)
    {
        parent::__construct($nombre,$edad,$sexo);
    }
    public function comer() {
        return "$this->nombre esta comiendo insectos ".parent::comer();
    }
    public function tomarSol() {
        return "$this->nombre está tomando el sol.";
    }
}
?>
<?php
class Canario extends Ave 
{
    //constructor
    public function __construct($nombre,$edad,$sexo)
    {
        parent::__construct($nombre,$edad,$sexo);
    }

    public function comer() {
        return "$this->nombre esta comiendo mixtura ".parent::comer();
    }

    public function cantar() {
        return "$this->nombre está cantando.";
    }
}

?>
<?php
class Pinguino extends Ave 
{
    //constructor
    public function __construct($nombre,$edad,$sexo)
    {
        parent::__construct($nombre,$edad,$sexo);
    }

    public function comer() {
        return "$this->nombre esta comiendo calamares ".parent::comer();
    }

    public function nadar() {
        return "$this->nombre está nadando en aguas muy frias.";
    }
}

?>
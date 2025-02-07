<?php
class Ave extends Animal
{
    //constructor
    public function __construct($nombre,$edad,$sexo)
    {
        parent::__construct($nombre,$edad,$sexo);
    }

    public function volar() {
        return "$this->nombre está volando.";
    }
}
?>
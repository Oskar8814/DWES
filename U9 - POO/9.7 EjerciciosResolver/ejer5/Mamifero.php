<?php
class Mamifero extends Animal 
{
    //Atributo de instancia
    protected $tipoDePelo;

    //Constructor
    public function __construct($nombre,$edad,$sexo,$tipoDePelo) {
        parent::__construct($nombre,$edad,$sexo);
        $this->tipoDePelo;
    }

    public function describePelo() {
        return "$this->nombre tiene un pelaje del tipo $this->tipoDePelo.";
    }

    public function amamantar() {
        return "$this->nombre está amamantando.";
    }
}

?>
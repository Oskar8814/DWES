<?php
class Perro extends Mamifero 
{
    public function __construct($nombre, $edad, $sexo) {
        parent::__construct($nombre, $edad, $sexo, "largo y áspero");
    }

    public function comer() {
        return "$this->nombre esta roiendo un hueso ".parent::comer();
    }

    public function moverCola() {
        return "$this->nombre está moviendo la cola.";
    }

}

?>
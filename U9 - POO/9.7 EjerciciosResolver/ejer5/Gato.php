<?php
class Gato extends Mamifero
{
    public function __construct($nombre, $edad,$sexo) {
        parent::__construct($nombre, $edad,$sexo, "corto y suave");
    }

    public function comer() {
        return "{$this->nombre} esta comiendo pescado ".parent::comer();
    }
}
?>
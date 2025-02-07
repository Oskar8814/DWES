<?php abstract class Animal 
{
    protected $nombre;
    protected $edad;
    protected $sexo;

    public function __construct($n,$e,$s = "macho") {  
        $this->nombre = $n; 
        $this->edad = $e; 
        $this->sexo = $s; 
    }

    public function __toString() { 
        return "Nombre: $this->nombre, Edad: $this->edad, Sexo: $this->sexo"; 
    }
    
    public function getSexo() { 
        return $this->sexo; 
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    
    
    public function comer() { 
        return "Ummhhh que rico esta."; 
    }
}

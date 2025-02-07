<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['ultima'])) {
    $_SESSION['ultima']="";
    $_SESSION['fecha']= 0;
}

class Nota 
{
    //Atributos de clase
    // private static $ultima;
    // private static $fecha;
    
    //Atributos de instancia
    private $titulo;
    private $texto;
    private $creacion;

    //metodos
    public function __construct($titu,$text)
    {
        $this->titulo = $titu;
        $this->texto = $text;
        $this->creacion = time();

        $_SESSION['ultima'] = $titu;
        $_SESSION['fecha'] = time();
    }

    //Getter y setters
    
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    public function getCreacion()
    {
        return $this->creacion;
    }

    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;
        return $this;
    }

    //Met static  
    public static function getUltima()
    {
        return $_SESSION['ultima'];
    }

    public static function getFecha()
    {
        return $_SESSION['fecha'];
    }
}

?>
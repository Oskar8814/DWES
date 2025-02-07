<?php

if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['potenciaGlobal'])) {
    $_SESSION['potenciaGlobal'] = 0;
    $_SESSION['interruptorGen'] = true;
}

class Bombilla 
{
    //Atrb clase
    // private static $potenciaGlobal = 0;
    // private static $interruptorGen = true;

    //Atributo de instancia
    private $estado; 
    private $potencia;
    private $ubicacion;

    //Metodos
    public function __construct($poten, $ubi)
    {
        $this->estado = false; //true = encendida, false = apagada
        $this->potencia = $poten;
        $this->ubicacion = $ubi;
    }

    public function encender(){
        if (!$this->getEstado()) {
            $_SESSION['potenciaGlobal']+=$this->potencia;
        }
        $this->estado = true;        
    }
    public function apagar(){
        if ($this->getEstado()) {
            $_SESSION['potenciaGlobal']-=$this->potencia;
        }
        $this->estado = false;
    }
    
    
    //Met staticos
    public static function getPotenciaGlobal(){
        return $_SESSION['potenciaGlobal'];
    }
    public static function getinterruptorGen(){
        return $_SESSION['interruptorGen'];
    }



    //Getter and Setter
    public function getPotencia()
    {
        return $this->potencia;
    }

    public function setPotencia($potencia)
    {
        $this->potencia = $potencia;
        return $this;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function estado(){
        if ($this->estado && $_SESSION['interruptorGen']==true) {
            return true;
        }else {
            return false;
        }
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
}

?>
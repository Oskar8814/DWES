<?php
abstract class Vehiculo
{
    //Atributos de clase
    private static $vehiculosCreados = 0;
    private static $kmTotales = 0;

    //Atributo de instancia
    protected $kmRecorridos;

    //constructor
    public function __construct()
    {
        Vehiculo::$vehiculosCreados++;
        $this->kmRecorridos = 0;
    }

    // Métodos de clase
    public static function getVehiculosCreados() {
        return Vehiculo::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return Vehiculo::$kmTotales;
    }

    //Método de instancia
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }

    public function recorrekm($km){
        $this->kmRecorridos += $km;
        Vehiculo::$kmTotales += $km;
        return "El vehiculo ha recorrido $km.";
    }
}

?>


<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['ingresoTotal'])) {
    $_SESSION['ingresoTotal'] = 0;
}
class Zona 
{   
    //Atributo de clase 
    // public static $ingresoTotal = 0;

    //Atributo de instancia
    private $nombre;
    private $capacidad;
    private $precioEntrada;
    private $vendidasEntradas;

    //metodos
    public function __construct($nom, $capacidad, $precioE)
    {
        $this->nombre = $nom;
        $this->capacidad=$capacidad;
        $this->precioEntrada = $precioE;
        $this->vendidasEntradas = 0;
    }

    public function disponibles(){
        return $this->capacidad - $this->vendidasEntradas;
    }

    public function vender($cantidadEntradas){
        if ( $cantidadEntradas > $this->disponibles() ) {
            return "No quedan $cantidadEntradas disponibles en esa zona";
        }

        $this->vendidasEntradas+=$cantidadEntradas;
        $_SESSION['ingresoTotal'] += $cantidadEntradas*$this->precioEntrada;
        return "Venta realizada con exito"; 
    }

    public static function getIngresosTotales() {
        return $_SESSION['ingresoTotal'];
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPrecioEntrada()
    {
        return $this->precioEntrada;
    }

    public function setPrecioEntrada($precioEntrada)
    {
        $this->precioEntrada = $precioEntrada;
        return $this;
    }

    public function getVendidasEntradas()
    {
        return $this->vendidasEntradas;
    }

    public function setVendidasEntradas($vendidasEntradas)
    {
        $this->vendidasEntradas = $vendidasEntradas;
        return $this;
    }


    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
        return $this;
    }
}


?>
<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['totalpendientes'])) {
    $_SESSION['totalpendientes'] = 0;
}

class Reserva {

    //Atributo de clase
    private static $totalPendientes = 0;

    //atributos de instancia
    private $usuario;
    private $fechaHora;
    private $sala;
    private $estado;


    //metodo constructor
    public function __construct($usu,$fecha,$sala)
    {

        if ($fecha - time() < 24*60*60) {
            $fecha = time() + (24*60*60);
        }

        $this->usuario = $usu;
        $this->sala = $sala;
        $this->fechaHora = $fecha;
        $this->estado = "PENDIENTE";

        $_SESSION['totalpendientes']++;
    }

    //getter setter static

    public static function getTotalPendientes()
    {
        return $_SESSION['totalpendientes'];
    }

    public static function setTotalPendientes($totalPendientes)
    {
        $_SESSION['totalpendientes'] = $totalPendientes;
    }

    //getter y setter
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function getFecha()
    {
        
        return date("d/m/Y", $this->fechaHora);
    }
    public function getHora()
    {
        return date("H:i", $this->fechaHora);
    }

    public function getSala()
    {
        return $this->sala;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }

    public function confirmar(){
        $this->estado = "CONFIRMADA";
        
    }
    
    public function anular(){
        $diferencia = $this->fechaHora - time();
        if ($diferencia< 24*60*60) {
            return "ERROR";
        }else{
            $this->estado = "CANCELADA";
            return "OK";
        }
    }


}

?>
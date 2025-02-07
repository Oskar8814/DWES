<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['importantes'])) {
    $_SESSION['importantes']= 0;
}
class Email 
{

    //atributo de clase
    private static $importantes = 0;

    //atributos de instancia
    private $emisor;
    private $receptor;
    private $asunto;
    private $fecha;


    //Constructor
    public function __construct($emisor,$receptor,$asunto,$fecha)
    {
        $this->emisor = $emisor;
        if (strtolower($emisor)  === strtolower($receptor) ) {
            $receptor = $receptor."_bis";
        }

        $this->receptor = $receptor;
        $this->asunto = $asunto;
        $this->fecha = $fecha;
    }

    //Getter
    public function getEmisor()
    {
        return $this->emisor;
    }
    
    public function getReceptor()
    {
        return $this->receptor;
    }
    
    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    function destacarAsunto() {
        $asunto = $this->asunto;
        $asunto = "IMPORTANTE ".$asunto;

        $this->asunto = $asunto;
    }

    function comprobarImportante(){
        $asunto = $this->asunto;
        $partes = explode(" ", $asunto);
        if (strtolower($partes[0]) ===  "importante") {
            
            return true;
        }else {
            return false;
        }
    }

    function retrasarEnvio(){
        $fecha = $this->fecha;
        $fechaInt = strtotime($fecha);
        if ($fechaInt>time()) {
            $fechaInt += 24*60*60;
            $this->fecha = date("d-m-Y",$fechaInt);
            return "La fecha ha sido actualizada";
        }else{
            return"La fecha no ha sido actualizada";
        }
    }

    public static function getImportantes()
    {
        return $_SESSION['importantes'];
    }
}

?>
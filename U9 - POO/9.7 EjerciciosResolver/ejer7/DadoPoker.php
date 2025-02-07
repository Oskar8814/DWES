<!-- Crea la clase DadoPoker. Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J, 7 y 8 . Crea 
el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor aleatorio para el objeto al 
que se le aplica el método. Crea también el método nombreFigura(), que diga cuál es la figura que ha salido 
en la última tirada del dado en cuestión. Crea, por último, el método getTiradasTotales() que debe mostrar 
el número total de tiradas entre todos los dados. Realiza una aplicación que permita tirar un cubilete con cinco 
dados de poker. -->

<?php
session_start();
if (!isset($_SESSION['tiradasTotales'])) {
    $_SESSION['tiradasTotales'] = 0;
    $_SESSION['figuras'] = ["As", "K", "Q", "J", "7", "8"];
}
class DadoPoker
{
//atrib de clase
// private static $figuras =["As", "K", "Q", "J", "7", "8"];
// private static $tiradasTotales = 0;

//atributos
private $tirada;

function __construct()
{
    $this->tira(); //Genera una tirada al crear el dado
}

//metodos
public function tira(){
    $tirada = rand(0,5);
    $this->tirada = $tirada;

    $_SESSION['tiradasTotales']++;
}
public function nombreFigura(){
    $indice = $this->tirada;
    $figura = $_SESSION['figuras'][$indice];
    return $figura;
}

public static function getTiradasTotales()
{
    return $_SESSION['tiradasTotales'];
}

}
?>
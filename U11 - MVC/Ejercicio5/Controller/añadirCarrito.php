<?php
require_once ('../Model/Avion.php');
require_once ('../Model/Cesta.php');

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['añadir'])) {
    $id = $_REQUEST['añadir']; //Codigo del producto
}else{
    header('Location:../Controller/index.php');
}

$avionAux = Avion::getAvionesById($id);

//Comprueba que exista stock para anadirlo en la cesta
if ($avionAux->getStock()>0) {
    $producto = Cesta::getProducto($_SESSION['id'],$id);    

    $productoAux = new Cesta ($_SESSION['id'],$id,1);
    if ($producto != null) {
        $cantidad = $producto->getCantidad()+1;
        $productoAux2 = new Cesta ($_SESSION['id'],$id,$cantidad);
        $productoAux2->update();
    }else {
        $productoAux->insert();
    }

    header('location:'.getenv('HTTP_REFERER'));//Vuelve a la pagina anterior
    //header('location:ejer3.php');
}else {
    header('location:'.getenv('HTTP_REFERER'));//Vuelve a la pagina anterior
}


?>
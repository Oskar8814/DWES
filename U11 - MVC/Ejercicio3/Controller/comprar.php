<?php
require_once '../Model/Avion.php';
if (session_status() == PHP_SESSION_NONE) session_start();

//Vaciar la cesta
if (isset($_SESSION['carrito'])) {

    //Comprobar que todos los articulos del carrito tienen stock
    $comprobacion = true;

    foreach ($_SESSION['carrito'] as $key => $cantidad) {
        $avionAux = Avion::getAvionesById($key);
        if ($cantidad > $avionAux->getStock()) {
            $comprobacion = false;
        }
    }


    if ($comprobacion) {

        //Actualiza el stock de cada avion 
        foreach ($_SESSION['carrito'] as $key => $cantidad) {
            $avionAux = Avion::getAvionesById($key);
            Avion::vender($cantidad, $avionAux->getCodigo());
        }

        
        //Eliminar la sess del carrito
        unset($_SESSION['carrito']);

        //Eliminar la cookie del carrito
        foreach ($_COOKIE['carrito'] as $key => $value) {
            setcookie("carrito[$key]", "", time() - 3600);
        }
    }

    header('location:../Controller/mostrarCarrito.php');
} else {
    header('location:../Controller/index.php');
}

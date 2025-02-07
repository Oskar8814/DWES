<?php
require_once '../Model/Avion.php';
include_once '../Controller/funciones.php';

if (session_status() == PHP_SESSION_NONE) session_start();
// if (!$_SESSION['carrito']) {
//     header('location:../Controller/index.php');
// }


if (isset($_REQUEST['comprar'])) {
    
    if (isset($_SESSION['carrito'])) {
        //Comprobar que todos los articulos del carrito tienen stock
        $comprobacion = true;
        $carrito = null;

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

            $carrito = $_SESSION['carrito'];

            //Eliminar la sess del carrito
            unset($_SESSION['carrito']);
            
            //Eliminar la cookie del carrito
            foreach ($_COOKIE['carrito'] as $key => $value) {
                setcookie("carrito[$key]", "", time() - 3600);
            }
        }
    }
}

//Carga la viasta del carrito.
include '../View/mostrarCarrito_view.php';

//Genera la factura 
if (isset($_REQUEST['comprar']) && $carrito != null) {
    echo generaFactura($carrito);
}


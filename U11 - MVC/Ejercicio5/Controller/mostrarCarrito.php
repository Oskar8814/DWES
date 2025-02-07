<?php
require_once '../Model/Avion.php';
require_once '../Model/Cesta.php';

include_once '../Controller/funciones.php';

if (session_status() == PHP_SESSION_NONE) session_start();
// if (!$_SESSION['carrito']) {
    //     header('location:../Controller/index.php');
    // }
    
    
//Obtener la cesta del usuario
$data['cesta'] = Cesta::getCestasById($_SESSION['id']);


if (isset($_REQUEST['comprar'])) {
    
    if ($data['cesta'] != null) {
        //Comprobar que todos los articulos del carrito tienen stock
        $comprobacion = true;
        $carrito = null;

        foreach ($data['cesta'] as $producto) {
            $avionAux = Avion::getAvionesById($producto->getCod_producto());
            if ($producto->getCantidad() > $avionAux->getStock()) {
                $comprobacion = false;
            }
        }
        
        
        if ($comprobacion) {
            
            //Actualiza el stock de cada avion 
            foreach ($data['cesta'] as $producto) {
                $avionAux = Avion::getAvionesById($producto->getCod_producto());
                Avion::vender($producto->getCantidad(), $avionAux->getCodigo());
            }

            $carrito = $data['cesta'];

            //Eliminar el carrito
            // unset($_SESSION['carrito']);
            $data['cesta'] = null;
            Cesta::deleteAll($_SESSION['id']);
        }
    }
}


//Carga la viasta del carrito.
include '../View/mostrarCarrito_view.php';

//Genera la factura 
if (isset($_REQUEST['comprar']) && $carrito != null) {
    echo generaFactura($carrito);
}


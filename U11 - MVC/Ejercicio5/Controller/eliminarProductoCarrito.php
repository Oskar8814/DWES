<?php
require_once '../Model/Cesta.php';
if (session_status() == PHP_SESSION_NONE) session_start();

//Obtener la cesta del usuario
$data['cesta'] = Cesta::getCestasById($_SESSION['id']);

if ($data['cesta']!=null) {
    
    if (isset($_REQUEST['eliminar'])) {
        $keyEliminar = $_REQUEST['eliminar'];
        
        $producto = Cesta::getProducto($_SESSION['id'],$keyEliminar);
        $cantidad = $producto->getCantidad();

        if ($producto != null && $cantidad>1) {
            $cantidadAux = $producto->getCantidad()-1;
            $productoAux = new Cesta($_SESSION['id'],$keyEliminar,$cantidadAux);
            $productoAux ->update();
        }else {
            $productoAux = new Cesta($_SESSION['id'],$keyEliminar,0);
            $productoAux ->delete();
            
        }

    }

    header('location:mostrarCarrito.php');
}else {
    header('location:index.php');
}
?>
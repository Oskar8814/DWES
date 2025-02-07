<?php
session_start();

if (isset($_SESSION['carrito'])) {
    
    if (isset($_REQUEST['eliminar'])) {
        $keyEliminar = $_REQUEST['eliminar'];
        
        if ($_SESSION['carrito'][$keyEliminar] > 1) {
            $_SESSION['carrito'][$keyEliminar]--;       //Disminuye la cantidad de producto segun la key en el carrito
            setcookie("carrito[$keyEliminar]", $_SESSION['carrito'][$key], time() + 3600); //Reseteamos la cookie con el nuevo valor de la session, uno menos de cantidad.
        } elseif ($_SESSION['carrito'][$keyEliminar] == 1) {
            unset($_SESSION['carrito'][$keyEliminar]);      //Elimina el producto del carrito si hay menos de 1
            setcookie("carrito[$keyEliminar]", "", time() - 3600); //Eliminamos el producto de la cookie carrito
        } 
    }

    header('location:../Controller/mostrarCarrito.php');
}else {
    header('location:../Controller/index.php');
}
?>
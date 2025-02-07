<?php
session_start();

if (isset($_SESSION['carrito'])) {
    //Eliminar la sess del carrito
    unset($_SESSION['carrito']);

    //Eliminar la cookie del carrito
    foreach ($_COOKIE['carrito'] as $key => $value) {
        setcookie("carrito[$key]","",time()-3600);
    }

    header('location:../Controller/mostrarCarrito.php');
}else {
    header('location:../Controller/index.php');
}
?>
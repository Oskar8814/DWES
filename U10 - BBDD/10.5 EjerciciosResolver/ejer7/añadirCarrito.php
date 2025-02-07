<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['añadir'])) {
    $id = $_REQUEST['añadir'];
}else{
    header('Location:index.php');
}

if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]++; //Si el producto ya esta en el carrito añade uno más
    setcookie("carrito[$id]", $_SESSION['carrito'][$id], time() + 3600); //resetea la cookie para tener la misma cantidad que en la session y actualizarse
} else {
    $_SESSION['carrito'][$id] = 1;
    setcookie("carrito[$id]", $_SESSION['carrito'][$id], time() + 3600);
}
header('location:'.getenv('HTTP_REFERER'));//Vuelve a la pagina anterior
//header('location:ejer3.php'); 
?>
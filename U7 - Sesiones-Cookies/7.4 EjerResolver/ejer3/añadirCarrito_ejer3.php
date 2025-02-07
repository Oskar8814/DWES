<?php
session_start();

if (isset($_SESSION['catalogo'])) {
    if (isset($_REQUEST['añadir'])) {
        $key = $_REQUEST['añadir'];
    }
} else {
    header('location:ejer3.php');
}

if (isset($_SESSION['carrito'][$key])) {
    $_SESSION['carrito'][$key]++; //Si el producto ya esta en el carrito añade uno más
    setcookie("carrito[$key]", $_SESSION['carrito'][$key], time() + 3600); //resetea la cookie para tener la misma cantidad que en la session y actualizarse
} else {
    $_SESSION['carrito'][$key] = 1;
    setcookie("carrito[$key]", $_SESSION['carrito'][$key], time() + 3600);
}

header('location:'.getenv('HTTP_REFERER'));//Vuelve a la pagina anterior
//header('location:ejer3.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir al Carrito</title>
</head>
<body>
    
</body>
</html>
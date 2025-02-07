<?php session_start(); // Inicio de sesión 
    if (isset($_REQUEST['vaciar'])) {
        session_destroy();
        header('refresh:0;');
    }
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        producto: <input type="text" name="producto" id="">
        <input type="submit" value="Añadir a la cesta">
    </form>
    <?php
        if (isset($_REQUEST['producto'])) {
            $_SESSION['carrito'] [] = $_REQUEST['producto'];
        }
        echo "<hr>";
        $carrito = $_SESSION['carrito'];
        foreach ( $carrito as $key => $value) {
            echo "$value <br>";
        }

    ?>
    <form action="" method="post">
        <input type="submit" value="Vaciar la cesta">
        <input type="hidden" name="vaciar">
    </form>
</body>
</html>
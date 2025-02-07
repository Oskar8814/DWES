<?php
session_start();
if (!isset($_REQUEST['añadir'])) {
    header('location:ejer3.php');
}

if (isset($_REQUEST['nombre'])||isset($_REQUEST['precio'])||isset($_REQUEST['imagen'])||isset($_REQUEST['descripcion'])) {
    
    $ultimaKey = "";
    foreach ($_SESSION['catalogo'] as $key => $value) {
        $ultimaKey = $key;
    }

    $num = (int)substr($ultimaKey,2); //Coge de "av1" solamente el numero
    $num +=1;

    $nuevaKey = 'av'. $num;
    // var_dump($num);
    $_SESSION['catalogo'][$nuevaKey]["nombre"] = $_REQUEST['nombre'];
    $_SESSION['catalogo'][$nuevaKey]["precio"] = $_REQUEST['precio'];
    $_SESSION['catalogo'][$nuevaKey]["imagen"] = $_REQUEST['imagen'];
    $_SESSION['catalogo'][$nuevaKey]["descripcion"] = $_REQUEST['descripcion'];

    setcookie("catalogo", base64_encode(serialize($_SESSION['catalogo'])),time()+3600);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="css/añadirProducto.css">
</head>
<body>
    <div class="form-container">
        <h3>Añadir un nuevo Producto</h3>
        <form action="#" method="post" style="display: inline;">
            Introduce el nombre del producto : <input type="text" name="nombre" id=""><br>
            Introduce el precio del producto : <input type="number" name="precio" id=""><br>
            Introduce el nombre de la imagen : <input type="text" name="imagen" id=""><br>
            Introduce la descripcion : <textarea name="descripcion" id="" cols="100" rows="10"></textarea><br><br>
            <input type="submit" value="Añadir">
        </form>
        <form id="form" action="administrarProductos_ejer3.php" method="post" style="display: inline;">
            <input type="submit" value="Volver">
        </form>
    </div>

</body>
</html>
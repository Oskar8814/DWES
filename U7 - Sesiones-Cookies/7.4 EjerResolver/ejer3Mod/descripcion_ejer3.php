<?php
session_start();

if (isset($_SESSION['catalogo'])) {
    if (isset($_REQUEST['descripcion'])) {
        $key = $_REQUEST['descripcion'];
    }
} else {
    header('location:ejer3.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción del Producto</title>
    <link rel="stylesheet" href="css/descripcion.css">
    <!-- <style>
        img {
            height: 280px;
            width: 600px;
        }
    </style> -->
</head>

<body>
<div class="product-container">
    <!-- Mostrar los datos del avion con la descripcion solicitada -->
    <h2>Datos del Avión</h2>
    <img src="<?=$_SESSION['catalogo'][$key]["imagen"] ?>" alt=""><br>
    <div class="product-details">
        <h4>Nombre: <?= $_SESSION['catalogo'][$key]["nombre"]?></h4>
        <h4>Precio: <?= $_SESSION['catalogo'][$key]["precio"] ?></h4>
        <h4>Detalles: <?=$_SESSION['catalogo'][$key]["descripcion"]?></h4>
    </div>
    <!-- Formulario para reenviarnos a la ppl y añadir el avion al carrito segun su identificador -->
    <form action="añadirCarrito_ejer3.php" method="post">
        <input type="hidden" name="añadir" value="<?= $key ?>">
        <input type="submit" value="Añadir al carrito"><br><br>
    </form>
    <form action="ejer3.php" method="post">
        <input type="submit" value="Volver" class="back-btn"><br><br>
    </form>
    <form action="administrarProductos_ejer3.php" method="post">
        <input type="submit" value="Modificar el producto" class="modify-btn"><br><br>
    </form>
</div>
</body>

</html>
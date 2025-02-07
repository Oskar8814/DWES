<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            height: 280px;
            width: 600px;
        }
    </style>
</head>
<body>
    <?php
    // Si recibe el input descripcion de la pag ppl recogemos el array catalogo y el identificador del avion que quiere la descripcion, sino regresa a la pagina ppl
    if (isset($_REQUEST['descripcion'])) {
        $catalogo = unserialize(base64_decode($_REQUEST['catalogo']));
        $codigo = $_REQUEST['descripcion'];
    }else {
        header('location:ejer6.php');
    }

    foreach ($catalogo as $key => $value) {
        if ($key === $codigo) {
            ?>
            <!-- Mostrar los datos del avion con la descripcion solicitada -->
            <h2>Datos del Avión</h2>
            <img src="<?= $value["imagen"] ?>" alt=""><br>
            <h4>Nombre: <?= $value['nombre'] ?></h4>
            <h4>Precio: <?= $value['precio'] ?></h4>
            <h4>Detalles: <?= $value['descripcion'] ?></h4>
            
            <!-- Formulario para reenviarnos a la ppl y añadir el avion al carrito segun su identificador -->
            <form action="ejer6.php" method="post">
                <input type="hidden" name="añadir" value="<?= $key ?>">
                <input type="submit" value="Añadir al carrito"><br><br>
            </form>
            <form action="ejer6.php" method="post">
                <input type="submit" value="Volver"><br><br>
            </form>

            <?php            
        }
    }
    ?>
</body>
</html>
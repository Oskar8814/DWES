
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            height: 280px;
            width: 600px;
        }
    </style>
</head>
<body>
    <h2>Descripción del Avión</h2>
    <?php
    ?>
    <img src="../View/<?= $data['avion']->getImagen() ?>" alt="imagen del avión">
    <h4>Nombre: <?= $data['avion']->getNombre() ?></h4>
    <h4>Precio: <?= $data['avion']->getPrecio() ?></h4>
    <h4>Stock: <?= $data['avion']->getStock() ?></h4>
    <h4>Detalles: <?= $data['avion']->getDescripcion() ?></h4>
    <!-- Formularios para reenviarnos a la ppl y añadir el avion al carrito segun su identificador -->
    <form action="../Controller/añadirCarrito.php" method="post">
        <input type="hidden" name="añadir" value="<?= $data['avion']->getCodigo()?>">
        <input type="submit" value="Añadir al carrito"><br><br>
    </form>
    <form action="../Controller/index.php" method="post">
        <input type="submit" value="Volver"><br><br>
    </form>
    <form action="../Controller/administrarProductos.php" method="post" <?= ($_SESSION['rol'] !== 'admin') ? 'hidden' : ''; ?>>
        <input type="submit" value="Modificar el producto"><br><br>
    </form>
</body>
</html>
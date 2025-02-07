<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Desea eliminar el producto <?= $data['avion']->getNombre() ?></h2>
    <img src="../View/<?= $data['avion']->getImagen() ?>" alt="Imagen de Avion" width="150px"><br>

    <form action="../Controller/eliminarProductos.php" method="post"  style="display: inline;" >
        <input type="hidden" name="eliminar" value="<?= $_REQUEST['eliminar'] ?>">
        <input type="submit" value="Si">
    </form>
    <form action="../Controller/administrarProductos.php" method="post" style="display: inline;">
        <input type="submit" value="No">
    </form>
</body>
</html>
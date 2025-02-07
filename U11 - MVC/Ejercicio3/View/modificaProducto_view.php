
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Productos</title>
    <link rel="stylesheet" href="css/modificarProducto.css">
</head>
<body>

    <div class="form-container">
    <h3>Modificacion del producto <?= $data['avion']->getNombre() ?></h3>

    <form action="../Controller/updateProducto.php" enctype="multipart/form-data" method="post" style="display: inline;">
        <label for="nombre">Introduce el nombre del producto:</label>
        <input type="text" name="nombre" value="<?= $data['avion']->getNombre() ?>"><br>
        
        <label for="precio">Introduce el precio del producto:</label>
        <input type="number" name="precio" value="<?= $data['avion']->getPrecio() ?>"><br>

        <label for="stock">Introduce el stock del producto:</label>
        <input type="number" name="stock" value="<?= $data['avion']->getStock() ?>"><br>
        
        <label for="imagen">Subir una imagen del producto:</label>
        <input type="hidden" name="imagenAnterior" value="<?= $data['avion']->getImagen() ?>">
        <img src="../View/<?= $data['avion']->getImagen() ?>" alt="" width="150px">
        <input type="file" id="imagen" name="imagen"><br>
        
        <label for="descripcion">Introduce la descripción:</label>
        <textarea name="descripcion" id="" cols="100" rows="10"><?= $data['avion']->getDescripcion()  ?></textarea><br><br>
        
        <input type="submit" value="Modificar">
        <input type="hidden" name="keymod" value="<?= $data['avion']->getCodigo() ?>">
    </form>
    <form id="form" action="../Controller/administrarProductos.php" method="post" style="display: inline;">
        <input type="submit" value="Volver">
    </form>
</div>
</body>
</html>
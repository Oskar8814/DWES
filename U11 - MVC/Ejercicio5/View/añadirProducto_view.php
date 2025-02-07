
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
</head>

<body>
    <div class="form-container">
        <h3>Añadir un nuevo Producto</h3>
        <!-- formulario para añadir nuevo producto -->
        <form action="../Controller/grabarProducto.php" enctype="multipart/form-data" method="post" style="display: inline;">
            Introduce el nombre del producto : <input type="text" name="nombre" id=""><br>
            Introduce el precio del producto : <input type="number" name="precio" id=""><br>
            Subir una imagen del producto: <input type="file" name="imagen" id="imagen" accept="image/*" required><br>
            Introduce la descripción: <textarea name="descripcion" id="" cols="100" rows="10"></textarea><br>
            Introduce el stock del producto: <input type="number" name="stock" id=""><br>
            <br>
            <input type="submit" value="Añadir">
        </form>

        <form id="form" action="../Controller/administrarProductos.php" method="post" style="display: inline;">
            <input type="submit" value="Volver">
        </form>
    </div>

</body>

</html>
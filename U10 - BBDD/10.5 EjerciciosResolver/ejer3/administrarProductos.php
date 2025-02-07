<?php
if (!isset($_REQUEST['administrar'])) {
    header('Location:index.php');
}

try {
    $conexion = new PDO("mysql:host=localhost;dbname=aviones;charset=utf8","root","");
    // echo "Se ha establecido una conexión con el servidor de bases de datos.";
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
$consulta = $conexion ->query("SELECT id, nombre, precio, imagen, descripcion FROM productos");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td,tr,table{
            border: 1px solid black;
            /* border-collapse: collapse; */
        }
        img{
            height: 100px;
            width: 300px;
        }
        
    </style>
</head>
<body>
    <h1>Mantenimiento de los productos</h1>
    <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Descripción</th>
            </tr>
            <?php
            while ($avion = $consulta->fetchObject()) {
                ?>
                <tr>
                    <td><?= $avion->nombre ?></td>
                    <td><?= $avion->precio ?></td>
                    <td><img src="<?= $avion->imagen ?>" alt="imagen de avion"></td>
                    <td><?= $avion->descripcion ?></td>
                    <td>
                    <form action="eliminarProducto.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $avion->id ?>">
                    </form>
                </td>
                <td>
                    <form action="modificarProducto.php" method="post">
                        <input type="submit" value="Modificar">
                        <input type="hidden" name="modificar" value="<?= $avion->id ?>">
                    </form>
                </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <h1>Añadir un nuevo Producto</h1>
        <form action="altaProducto.php" method="post">
            <label for="">Nombre:</label>
            <input type="text" name="nombre" id="" required><br><br>
            <label for="">Precio:</label>
            <input type="number" name="precio" id="" required><br><br>
            <label for="">Imagen:</label>
            <input type="text" name="imagen" id="" required><br><br>
            <label for="">Descripción:</label>
            <textarea name="descripcion" id="" required></textarea><br><br>
            <input type="submit" value="Añadir">
        </form>
</body>
</html>
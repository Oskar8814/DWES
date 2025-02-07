<?php
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
        <h1>Tienda de Aviones</h1>
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
                </tr>
                <?php
            }
            ?>
        </table><br>
        <form action="administrarProductos.php" method="post">
            <input type="hidden" name="administrar">
            <input type="submit" value="Administrar Productos">
        </form>
    </body>
    </html>
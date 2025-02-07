
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        th,td,tr,table{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8","root","");
        // echo "Se ha establecido una conexión con el servidor de bases de datos.";
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");

    ?>
    <h1>Mantenimiento de clientes</h1>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
        </tr>
        <?php
        while ($cliente = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->direccion ?></td>
                <td><?= $cliente->telefono ?></td>
                <td>
                    <form action="eliminarCliente.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $cliente->dni ?>">
                    </form>
                </td>
                <td>
                    <form action="modificarCliente.php" method="post">
                        <input type="submit" value="Modificar">
                        <input type="hidden" name="modificar" value="<?= $cliente->dni ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h1>Añadir un nuevo Cliente</h1>
    <form action="altaCliente.php" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="" required><br><br>
        <label for="dni">Nombre:</label>
        <input type="text" name="nombre" id="" required><br><br>
        <label for="dni">Dirección:</label>
        <input type="text" name="direccion" id="" required><br><br>
        <label for="dni">Teléfono:</label>
        <input type="text" name="telefono" id="" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
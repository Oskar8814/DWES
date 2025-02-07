<?php
    if (!isset($_REQUEST['modificar'])) {
        header('Location:index.php');
    }

    if (isset($_REQUEST['nombreMod'])) {

        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        
        $update= "UPDATE cliente SET nombre=\"$_REQUEST[nombreMod]\", 
        direccion=\"$_REQUEST[direccionMod]\", telefono=\"$_REQUEST[telefonoMod]\" WHERE dni=\"$_REQUEST[dniMod]\"";

        $conexion->exec($update);
        echo "Cliente modificado correctamente.";
        $conexion = null;
        header('Location:index.php'); // nos redirije en al index
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modificar los Datos del Usuario</h1>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        //Obtenemos el cliente que deseamos modificar de la BBDD
        $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente WHERE dni='$_REQUEST[modificar]'");
        $cliente = $consulta->fetchObject();
        $conexion = null;
    ?>
    <h3>Modificación del Usuario <?= $cliente-> nombre ?></h3>
    <form action="" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dniMod" id="" value="<?= $cliente-> dni ?> " readonly><br><br><!--  Solo lectura mediante el html asi ve el dni pero no lo puede modificar-->
        <label for="dni">Nombre:</label>
        <input type="text" name="nombreMod" id="" value="<?= $cliente-> nombre ?>"><br><br>
        <label for="dni">Dirección:</label>
        <input type="text" name="direccionMod" id="" value="<?= $cliente-> direccion ?>"><br><br>
        <label for="dni">Teléfono:</label>
        <input type="text" name="telefonoMod" id="" value="<?= $cliente-> telefono ?>"><br><br>
        <input type="submit" value="Modificar">
        <input type="hidden" name="modificar" <?= $_REQUEST['modificar'] ?>> <!-- Necesario para el primer iss  -->
    </form>
</body>
</html>
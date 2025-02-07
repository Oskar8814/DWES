<?php
if (isset($_REQUEST['dia']) && isset($_REQUEST['hora'])) {

    $asignaturas = ["Empresa e Iniciativa Emprendedora", "Desarrollo Web en Entorno Servidor", "Despliegue de Aplicaciones Web", "Diseño de Interfaces Web", "Desarrollo Web en Entorno Cliente", "Horas de Libre Configuracion"];

    if (isset($_REQUEST['asignatura'])) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        
        $consulta = $conexion->query("SELECT * FROM horario");
        $update = "UPDATE horario SET $_REQUEST[hora]=\"$_REQUEST[asignatura]\" WHERE dia=\"$_REQUEST[dia]\"";
        $conexion->exec($update);
        $conexion = null;
        header("Location: index.php");
    }
    
}else{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horario</title>
</head>

<body>
    <h1>Editar Horario</h1>
    <form action="" method="post" style="display: inline;">
        <label for="asignatura">Seleccionar Asignatura:</label>
        <select name="asignatura" id="">
            <?php
            foreach ($asignaturas as $key => $asignatura) {
            ?>
                <option value="<?= $asignatura ?>"><?= $asignatura ?></option>
            <?php
            }
            ?>
        </select>
        <input type="hidden" name="dia" value="<?= $_REQUEST['dia'] ?>">
        <input type="hidden" name="hora" value="<?= $_REQUEST['hora'] ?>">
        <br><br>
        <input type="submit" value="Modificar">
    </form>
    <form action="index.php" method="post" style="display: inline;">
        <input type="submit" value="Volver">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,tr,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Perfil de Usuario <?= $_SESSION['nombre'] ?></h1>

    <table>
        <tr><th>Descripcion</th><th>Profesor</th><th>Fecha</th></tr>
        <?php
        foreach ($data['incidencias'] as $incidencia) {
            ?>
            <tr>
                <td><?= $incidencia->getDescripcion() ?></td>
                <td><?= $incidencia->getProfesor() ?></td>
                <td><?= $incidencia->getFecha() ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <form action="../Controller/generaIndicidencia.php" method="post">
        <input type="submit" value="Generar una nueva Incidencia">
        <input type="hidden" name="nuevaIncidencia">
    </form>
    
    <form action="" method="post">
        <input type="submit" value="Cerrar Session">
        <input type="hidden" name="cerrarSesion">

    </form>

</body>
</html>
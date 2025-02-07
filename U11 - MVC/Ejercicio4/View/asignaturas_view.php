<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas</title>
    <link rel="stylesheet" href="../View/css/index.css">

</head>
<body>
    <h1>Asignaturas disponibles en el centro</h1>
    <table>
        <tr>
            <th>Código</th>
            <th>Asignatura</th>
            <th colspan="2"></th>
        </tr>
        <?php
        foreach ($data['asignaturas'] as $asignatura) {
            ?>
            <tr>
                <td><?= $asignatura->getCodigo() ?></td>
                <td><?= $asignatura->getNombre() ?></td>
                <td>
                    <form action="../Controller/alumnosMatriculados.php" method="post">
                        <input type="submit" value="Ver Alumnos">
                        <input type="hidden" name="codigo" value="<?= $asignatura->getCodigo() ?>">
                    </form>
                </td>
                <td>
                    <form action="../Controller/eliminarAsignatura.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminarAsignatura" value="<?= $asignatura->getCodigo() ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="actions__container">
        <form action="../Controller/nuevaAsignatura.php" method="post">
            <input type="submit" value="Nueva Asignatura">
        </form>
        <form action="../Controller/index.php" method="post">
            <input type="submit" value="Volver">
        </form>
    </div>
</body>
</html>
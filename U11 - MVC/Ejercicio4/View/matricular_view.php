<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>
<body>
    <h1>Alumno: <?= $_SESSION['alumno']->getApellidos().", ". $_SESSION['alumno']->getNombre() ?></h1>
    <h3>Matricular en un nuevo módulo</h3>
    <table>
        <tr>
            <th>Código</th>
            <th>Asignatura</th>
            <th></th>
        </tr>
        <?php
        foreach ($asignaturasLibres as $asignaturaLibre) {
            ?>
            <tr>
                <td><?= $asignaturaLibre->getCodigo() ?></td>
                <td><?= $asignaturaLibre->getNombre() ?></td>
                <td>
                    <form action="" method="post">
                        <input type="submit" value="Matricular">
                        <input type="hidden" name="codigoAsignatura" value="<?= $asignaturaLibre->getCodigo() ?>">
                        <input type="hidden" name="matricula" value="<?= $_SESSION['alumno']->getMatricula() ?>">
                        <input type="hidden" name="matricularAsignatura">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <form action="../Controller/asignaturasMatriculado.php" method="post">
        <input type="submit" value="Volver">
        <input type="hidden" name="verAsignaturas" value="<?= $_SESSION['alumno']->getMatricula() ?>">

    </form>
</body>
</html>
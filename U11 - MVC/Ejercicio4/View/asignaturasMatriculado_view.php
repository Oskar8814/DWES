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
    <table>
        <tr>
            <th>Código</th>
            <th>Asignatura</th>
            <th></th>
        </tr>

        <?php
        foreach ($asignaturas as $asignatura) {
            ?>
            <tr>
                <td><?= $asignatura->getCodigo() ?></td>
                <td><?= $asignatura->getNombre() ?></td>
                <td>
                    <form action="../Controller/desmatricular.php" method="post">
                        <input type="submit" value="Desmatricular">
                        <input type="hidden" name="codigoAsignatura" value="<?= $asignatura->getCodigo() ?>">
                        <input type="hidden" name="matricula" value="<?= $_SESSION['alumno']->getMatricula() ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="actions__container">
        <form action="../Controller/matricular.php" method="post">
            <input type="submit" value="Matricula nueva">
            <input type="hidden" name="matricular">
        </form>
        <form action="../Controller/index.php" method="post">
            <input type="submit" value="Volver">
        </form>
    </div>
</body>
</html>
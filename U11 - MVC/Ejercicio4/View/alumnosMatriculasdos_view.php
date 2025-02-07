<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>
<body>
    <h1>Asignatura: <?= $asignaturaAux->getNombre() ?></h1>
    <table>
        <tr><th>Matricula</th><th>Nombre</th><th></th></tr>
        <?php
        foreach ($data['alumnos'] as $alumno) {
            ?>
            <tr>
                <td><?= $alumno->getMatricula() ?></td>
                <td><?= $alumno->getApellidos().",".$alumno->getNombre() ?></td>
                <td>
                    <form action="../Controller/desmatricular.php" method="post">
                        <input type="submit" value="Desmatricular">
                        <input type="hidden" name="matricula" value="<?= $alumno->getMatricula() ?>">
                        <input type="hidden" name="codigoAsignatura" value="<?= $asignaturaAux->getCodigo() ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="actions__container">
        <form action="../Controller/asignaturas.php" method="post">
            <input type="submit" value="Volver">
        </form>
    </div>
</body>
</html>
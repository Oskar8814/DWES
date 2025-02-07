<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>
<body>
    
    <h1>Alumnos del IES Ruiz Gijón</h1>
    <table>
        <tr>
            <th colspan="2"></th>
            <th>Matricula</th>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>Curso</th>
            <th></th>
        </tr>

        <?php
        foreach ($data['alumnos'] as $alumno ) {
            ?>
            <tr>
                <td>
                    <form action="../Controller/eliminarAlumno.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $alumno->getMatricula() ?>">
                    </form>
                </td>
                <td>
                    <form action="../Controller/modificarAlumno.php" method="post">
                        <input type="submit" value="Modificar">
                        <input type="hidden" name="modificar" value="<?= $alumno->getMatricula() ?>">
                    </form>
                </td>
                <td><?= $alumno->getMatricula() ?></td>
                <td><?= $alumno->getApellidos()?></td>
                <td><?= $alumno->getNombre()?></td>
                <td><?= $alumno->getCurso()?></td>
                <td>
                    <form action="../Controller/asignaturasMatriculado.php" method="post">
                        <input type="submit" value="Ver Asignaturas">
                        <input type="hidden" name="verAsignaturas" value="<?= $alumno->getMatricula() ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="actions__container">
        <form action="../Controller/nuevoAlumno.php" method="post">
            <input type="submit" value="Nuevo Alumno">
        </form>
        <form action="../Controller/asignaturas.php" method="post">
            <input type="submit" value="Asignaturas">
        </form>
    </div>

</body>
</html>
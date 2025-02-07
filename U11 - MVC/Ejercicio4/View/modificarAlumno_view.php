<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="../View/css/form.css">
</head>
<body>
    <h1>Modificar los datos del Alumno</h1>
    <div class="container">

        <form action="../Controller/grabarAlumno.php" method="post">
            <label for="matricula">Matricula:</label>
            <input type="text" name="matricula" id="" value="<?=$alumnoAux->getMatricula() ?>" readonly>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombreMod" id="" value="<?=$alumnoAux->getNombre() ?>">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidosMod" id="" value="<?=$alumnoAux->getApellidos() ?>">
            <label for="curso">Curso:</label>
            <input type="text" name="cursoMod" id="" value="<?=$alumnoAux->getCurso() ?>">
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
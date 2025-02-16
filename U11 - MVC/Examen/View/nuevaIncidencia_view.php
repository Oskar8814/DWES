<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para nueva incidencia</h1>
    <form action="" method="post">
        <label for="">Fecha</label>
        <input type="text" name="fecha" id="" value="<?= $fecha ?>" readonly><br>
        <label for="">Descripcion</label>
        <textarea name="descripcion" id=""></textarea><br>
        <input type="submit" value="Registrar">
        <input type="hidden" name="generaIncidencia">
    </form>
</body>
</html>
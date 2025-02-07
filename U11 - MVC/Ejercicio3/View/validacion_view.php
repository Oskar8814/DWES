<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Validación</title>
    <link rel="stylesheet" href="css/validacion.css">
</head>
<body>
    <form action="../Controller/validacion.php" method="post">
        <h1>Formulario de Validación</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
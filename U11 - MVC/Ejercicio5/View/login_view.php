<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login de Usuario</h1>
    <form action="../Controller/index.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Enviar">
    </form>
    <form action="../Controller/registroUsuario.php" method="post">
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
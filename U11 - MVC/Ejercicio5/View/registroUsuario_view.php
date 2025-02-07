<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Registro de nuevo Usuario</h1>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="nuevoUsuario" id="usuario" required>
        <label for="pass">Contraseña:</label>
        <input type="text" name="nuevaPass" id="pass" required>
        <label for="pass">Rol:</label>
        <select name="nuevoRol" id="" required>
            <option value="admin">Administrador</option>
            <option value="cliente">Cliente</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
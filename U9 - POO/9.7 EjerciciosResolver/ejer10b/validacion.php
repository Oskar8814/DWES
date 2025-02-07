<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['usuario'])  && isset($_REQUEST['contraseña']) ) {
    $_SESSION['usuario'] = $_REQUEST['usuario'];
    $_SESSION['contraseña']= $_REQUEST['contraseña'];

    header('Location:administrar.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/validacion.css">
</head>
<body>

    <form action="" method="post">
        <label for="usuario">Introduzca el usuario</label>
        <input type="text" name="usuario" id="">
        <label for="contraseña">Introduzca la contraseña</label>
        <input type="text" name="contraseña" id="">
        <input type="submit" value="Validar">
        <a href="index2.php">Regresar</a>
    </form>
</body>
</html>
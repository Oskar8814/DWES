<?php
session_start();
if (isset($_REQUEST['usuario'])  && isset($_REQUEST['pass'])){
    $_SESSION['usuario'] = $_REQUEST['usuario'] ;
    $_SESSION['pass'] = $_REQUEST['pass'] ;
    header("location:administrarProductos_ejer3.php");
}
if (isset($_SESSION['usuario'])) {
    header('location:administrarProductos_ejer3.php');  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Validación</title>
    <link rel="stylesheet" href="css/validacion.css">
</head>
<body>
    <form action="" method="post">
        <h1>Formulario de Validación</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

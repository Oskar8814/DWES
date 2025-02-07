<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['contraseña'])) {
    $fp = fopen("usuarios.dat","a");
    
    $linea = $_REQUEST['usuario']. "," . $_REQUEST['contraseña'];
    fwrite($fp,$linea . PHP_EOL);

    fclose($fp);
    
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro de una nueva cuenta</h1>
    <h3>Introduzca los datos para la nueva cuenta</h3>
    <form action="" method="post">
        <label for="">Usuario</label>
        <input type="text" name="usuario" id="">
        <label for="">Contraseña</label>
        <input type="text" name="contraseña" id="">
        <input type="submit" value="Aceptar">
    </form>
</body>
</html>
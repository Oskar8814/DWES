<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = null;
}

if (isset($_COOKIE['usuario'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if ($_SESSION['usuario'] != null) {
    header('Location:index.php');
}

if (isset($_REQUEST['iniciarSesion'])) {
    
    function comprueba() {
        $rutaArchivo = $_REQUEST['usuario'].".rsv";

        if (file_exists($rutaArchivo)) {
            $fp = fopen($rutaArchivo, "r");
            while (!feof($fp)) {
                $linea = fgets($fp);
                $linea = trim($linea);

                $pass = $_REQUEST['contraseña'];
                if ($linea == $pass) {
                    setcookie("usuario", $_REQUEST['usuario'],strtotime("+1 month") );

                    return true;
                    break;
                }else{
                    return false;
                }
            }
        }
    }
    

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
    <h1>Iniciar sesion</h1>
    <form action="" method="post">
        <label for="">Usuario</label>
        <input type="text" name="usuario" id="">
        <label for="">Contraseña</label>
        <input type="text" name="contraseña" id="">
        <input type="hidden" name="iniciarSesion">
        <input type="submit" value="Iniciar Sesion">
    </form>

    <?php
    if (isset($_REQUEST['iniciarSesion'])) {
        if(comprueba()){
            $_SESSION['usuario'] = $_REQUEST['usuario'];
            header('Location:index.php');
        }else {
            echo "<p style='color:red'> Usuario no registrado o contraseña incorrecta!</p>";
        }
    }
    ?>

    <hr>
    <h1>Registro de Usuario</h1>
    <form action="registro.php" method="post">
        <label for="">Usuario</label>
        <input type="text" name="usuarioRegistro" id="">
        <label for="">Contraseña</label>
        <input type="text" name="contraseñaRegistro" id="">
        <input type="submit" value="Registrar">
    </form>


</body>
</html>
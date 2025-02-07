<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['usuario'])&&isset($_REQUEST['contraseña'])) {
    
    function comprueba(){
        $linea = $_REQUEST['usuario'].",". $_REQUEST['contraseña'];
        $fp = fopen("usuarios.dat","r");
        
        while(!feof($fp)){
            $line = fgets($fp);
            $line = trim($line);
            if ($line === $linea) {
                return true;
                break;
            }
        }
        return false;
    }
}

if (isset($_SESSION['usuario'])) {
    header("Location:principal.php");
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
    <h1>MASQUENOTAS</h1>
    <h3>Tus notas siempre accesibles</h3>
    <hr>
    <h3>Inicie sesion para acceder a su panel de notas</h3>

    <?php
    if (isset($_COOKIE['usuario'])) {
        $_SESSION['usuario']=$_COOKIE['usuario'];
        $_SESSION['contraseña']=$_COOKIE['contraseña'];
        ?>
            <form action="" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="" value="<?= $_SESSION['usuario']?>"><br>
                <label for="contraseña">Contraseña</label>
                <input type="text" name="contraseña" id="" value="<?= $_SESSION['contraseña'] ?>"><br>
                Recordar contraseña <input type="checkbox" name="recordar" id="">
                <input type="submit" value="Aceptar">
            </form>
        <?php
    }else{
    ?>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id=""><br>
        <label for="contraseña">Contraseña</label>
        <input type="text" name="contraseña" id=""><br>
        Recordar contraseña <input type="checkbox" name="recordar" id="">
        <input type="submit" value="Aceptar">
        
    </form>
    <?php
    }
    
    if (isset($_REQUEST['usuario']) && isset($_REQUEST['contraseña'])) {
        
        if (comprueba()) {
            $_SESSION['usuario']=$_REQUEST['usuario'];
            $_SESSION['contraseña']=$_REQUEST['contraseña'];
            header('Location:principal.php');
        }else{
            echo "<p style='color:red'> Usuario no registrado!</p>";
        }
        
    }
    if (isset($_REQUEST['recordar'])) {
        setcookie("usuario", $_SESSION['usuario'], strtotime("+1 month"));
        setcookie("contraseña", $_SESSION['contraseña'], strtotime("+1 month"));
        
    }else {
        setcookie("usuario", "",-1);
        setcookie("contraseña", "",-1);
    }
    ?>

    <hr>
    <h3>Todavia no tienes cuenta, registrate es gratis!!</h3>
    <form action="registrar.php" method="post">
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
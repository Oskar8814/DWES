<?php
include_once 'BombillaB.php';
include_once 'funciones.php';

if (session_status() == PHP_SESSION_NONE) session_start();
if (!$_SESSION['bombillas']) {
    header('Location:index2.php');
}

if (isset($_REQUEST['ubicacion']) && isset($_REQUEST['potencia'])) {

    $bombi = unserialize($_SESSION['bombillas'][$_REQUEST['indice']]); //Obtenemos el objeto de la bombilla que avamos a modificar
    //Obtenemos su estado (si esta encendida) para eliminar del contador general la potencia consumida
    if ($bombi->getEstado()) {
        $_SESSION['potenciaGlobal'] -= $bombi->getPotencia();
    }
    
    //Reajustamos los valores de la bombilla
    $bombi-> setUbicacion($_REQUEST['ubicacion']);
    $bombi-> setPotencia($_REQUEST['potencia']);

    //Reajustamos con la nueva potencia de la bombilla
    if ($bombi->getEstado()) {
        $_SESSION['potenciaGlobal'] += $_REQUEST['potencia'];
    }

    //Guardamos los nuevos valores en la ss de las bombillas y en el txt
    $_SESSION['bombillas'][$_REQUEST['indice']] = serialize($bombi);
    guardar();
    header('Location:index2.php');
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
    <?php
    if (isset($_REQUEST['modificar'])) {
        $indice = $_REQUEST['indice'];
        $bombillaObj = unserialize($_SESSION['bombillas'][$_REQUEST['indice']]);
        ?>
        <form action="" method="post">
            <label for="ubi">Ubicacion:</label>
            <input type="text" name="ubicacion" id="" value="<?= $bombillaObj->getUbicacion() ?>">
            <label for="potencia">Potencia:</label>
            <input type="number" name="potencia" id="" value="<?= $bombillaObj->getPotencia() ?>">
            <input type="submit" value="Modificar">
            <input type="hidden" name="indice" value="<?= $indice ?>">
        </form>
        <?php
    }
    ?>
</body>
</html>
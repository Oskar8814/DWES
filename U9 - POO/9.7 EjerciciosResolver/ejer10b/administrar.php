<?php
include_once 'BombillaB.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (!$_SESSION['bombillas']) {
    header('Location:index2.php');
}

if (isset($_REQUEST['cerrar'])) {
    $_SESSION['usuario']="";
    $_SESSION['contraseña']="";

    header('Location:index2.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if ($_SESSION['usuario'] == "admin" && $_SESSION['contraseña'] == "admin") {
    ?>
        <div class="cards-container">
            <?php
            foreach ($_SESSION['bombillas'] as $key => $bombilla) {
                $bombillaObj = unserialize($bombilla);
            ?>
                <div class="card">
                    <h3><?= $bombillaObj->getUbicacion() ?></h3>
                    <p>Potencia: <?= $bombillaObj->getPotencia() ?>W</p>
                    <img src="img/apagada.png" alt="Estado de la bombilla">
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="eliminar" value="1">
                        <input type="hidden" name="indice" value="<?= $key ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                    <form action="modificar.php" method="post">
                        <input type="hidden" name="modificar" value="1">
                        <input type="hidden" name="indice" value="<?= $key ?>">
                        <button type="submit">Modificar</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
        <form action="" method="post">
                <input type="hidden" name="cerrar" value="1">
                <button type="submit">Cerrar la Casa</button>
        </form>
    <?php
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['contraseña']);
        header('Location:validacion.php');
    }
    ?>
</body>

</html>
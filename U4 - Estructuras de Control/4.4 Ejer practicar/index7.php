<!-- Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El programa nos pedirá 
la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la combinación” y 
si acertamos se nos dirá “La caja fuerte se ha abierto satisfactoriamente”. Tendremos cuatro oportunidades para 
abrir la caja fuerte. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja Fuerte</title>
    <style>
        img {
            width: 550px;
            height: auto;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_REQUEST['combinacion'])) {
        $combinacion = "0300";
        $oportunidad = 4;
        $contraseña = "0300";
    } else {
        $combinacion = $_REQUEST['combinacion'];
        $oportunidad = $_REQUEST['oportunidad'];
        $contraseña = "0300";
    }

    if ($combinacion === $contraseña) {
        echo "<h3>Contraseña correcta, caja fuerte abierta.</h3>";
    ?>
        <img src="img/2203.i518.017.S.m005.c12.realistic safe locker open door set.jpg" alt="Caja fuerte abriendose">
    <?php
    } else {
        if ($oportunidad == 0) {
            echo "<h3>Lo siento has agotado las oportunidades. Caja Fuerte bloqueda.</h3>";
        } else {
    ?>
            <h2>Te quedan <?= $oportunidad ?> oportunidades para adivinar la contraseña.</h2>
            <h3>Introduce la contraseña de la Caja Fuerte</h3>
            <form action="index7.php" method="post">
                <input type="text" name="combinacion" maxlength="4" pattern="\d{4}">
                <input type="hidden" name="contraseña" value="0333">
                <input type="hidden" name="oportunidad" value=" <?= --$oportunidad ?> ">
                <input type="submit" value="Enviar">
            </form>
    <?php
        }
    }
    ?>

</body>

</html>
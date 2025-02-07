<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $comprobacion = $_REQUEST['comprobacion'];
        $contador = $_REQUEST['contador'];

        if ($comprobacion == "Samurai") {
            echo "<h2>Enhorabuena has ganado!!</h2>";
            ?>
            <img src="img/samurai.jpg" alt="imagen de un samurai">
            <h2>Has realizado <?= $contador ?> intentos</h2>
            <?php
        }else{
            echo "<h2>Lo siento, has fallado!! Intentalo de nuevo</h2>";
            ?>
            <h2>Has realizado <?= $contador ?> intentos</h2>
            <a href="ejer1.php?contador=<?=$contador?>">Volver</a>
            <?php
        }
    ?>
</body>
</html>
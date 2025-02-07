<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 600px;
            height: 600px;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_REQUEST['solucion'])) {
            $solucion = $_REQUEST['solucion'];
            $contador = $_REQUEST['contador'];
            $click = $_REQUEST['seleccionado'];
            $arrayImagen = unserialize(base64_decode($_REQUEST['arrayImagen']));
            
            //var_dump($click);
            if($solucion == "Japon"){
                echo "<h2>Enhorabuena has acertado!!</h2>";
                ?>
                <img src="img/japon.jpg" alt="imagen de Japon">
                <h2>Has realizado <?= $contador ?> intentos</h2>
                <?php
            }else{
                echo "<h2>Lo siento, has fallado!! Intentalo de nuevo</h2>";
                ?>
                <h2>Has realizado <?= $contador ?> intentos</h2>
                <?php
                    --$contador;
                ?>
                <a href="ejer3.php?arrayImagen=<?= base64_encode(serialize($arrayImagen)) ?>&contador=<?= $contador ?>&seleccionado=<?= $click ?>">Volver</a>
                <?php
                
            }
        }
    ?>
</body>
</html>
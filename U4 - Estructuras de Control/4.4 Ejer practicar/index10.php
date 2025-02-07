<!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A priori, 
el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir los datos 
cuando meta un número negativo. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        if (!isset($_REQUEST['num'])) {
            $num = 0;
            $aux = -1;
            $sumatorio = 0;
        }else{
            $num = $_REQUEST['num'];
            $aux =$_REQUEST['aux'];
            $sumatorio = $_REQUEST['sumatorio'];
        }

        if($num >= 0){
            ?>
                <h2>Introduce un número</h2>
                <form action="index10.php" method="post">
                    <input type="number" name="num" required>
                    <input type="hidden" name= "aux" value="<?= ++$aux ?>">
                    <input type="hidden" name= "sumatorio" value="<?= $sumatorio += $num?>">
                    <input type="submit" value="Enviar">
                </form>
            <?php

            echo "Contador $aux <br>";
            echo "Sumatorio $sumatorio";

        }else{
            $media = $sumatorio/$aux;
            echo " La media es $media";
        }
        
    ?>
</body>
</html>
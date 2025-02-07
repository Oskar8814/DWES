<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:0px;
        }
        td,tr{
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $serie = isset($_REQUEST['serie']) ? $_REQUEST['serie'] : null;

        $loteria1 = rand(1,50);
        $loteria2 = rand(1,50);
        $loteria3 = rand(1,50);
        $loteria4 = rand(1,50);
        $loteria5 = rand(1,50);
        $loteria6 = rand(1,50);

        $loteriaSerie = 22;
        $aciertos = 0;
        $cuenta = 0;

        echo "<table><tr><td>$loteria1</td><td>$loteria2</td><td>$loteria3</td><td>$loteria4</td><td>$loteria5</td><td>$loteria6</td></tr></table>";

        if (isset($_REQUEST[$loteria1])) {
            $aciertos++;

        }
        if (isset($_REQUEST[$loteria2])) {
            $aciertos++;
        }

        if (isset($_REQUEST[$loteria3])) {
            $aciertos++;
        }
        if (isset($_REQUEST[$loteria4])) {
            $aciertos++;
        }
        if (isset($_REQUEST[$loteria5])) {
            $aciertos++;
        }
        if (isset($_REQUEST[$loteria6])) {
            $aciertos++;
        }


        if ($aciertos<4) {
            echo "<h1>Has tenido menos de 4 aciertos</h1>";
        }elseif($aciertos==4){
            echo "<h1>Has tenido 4 aciertos dinero devuelto</h1>";
        }else if($aciertos == 5){
            echo "<h1>Has obtenido 5 aciertos. Has ganado 30€. Enhorabuena!!</h1>";
            $cuenta +=30;
        }else if($aciertos == 6){
            echo "<h1>Has obtenido 6 aciertos. Has ganado 100€. Enhorabuena!!</h1>";
            $cuenta +=100;
        }

        if ($serie == $loteriaSerie) {
            echo "<h2>Enhorabuena!! has acertado la serie!! Ganas 600€</h2>";
            $cuenta+=600;
        }

        echo"<h3>Tienes en tu cuenta $cuenta €</h3>"
    ?>
    <a href="ejer2_loteria.php">Volver</a>
</body>
</html>
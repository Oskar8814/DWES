<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // Carga las funciones matemáticas  
    include 'matematicas.php'; 

    if (!isset($_REQUEST['voltear'])) {
        ?>
        Introduce un número para voltearlo.
        <form action="" method="post">
            <input type="number" name="voltear" min="0" autofocus><br>
            <input type="submit" value="Aceptar">
        </form>
        <?php
    }else{
        $voltear = $_REQUEST['voltear'];
        $volteado = voltea($voltear);
        echo "Número $voltear seria $volteado volteado.<br>";
    }

    if (!isset($_REQUEST['capicua'])) {
        ?>
        Introduce un número para comprobar si es capicua.
        <form action="" method="post">
            <input type="number" name="capicua" min="0" autofocus>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $capicua = $_REQUEST['capicua'];
        if (esCapicua($capicua)) {
            echo "El número $capicua es capicua <br>";
        }else{
            echo "EL número $capicua no es capicua <br>";
        }
    }

    if (!isset($_POST['numero'])) {
    ?>
    Introduzca un número para comprobar si es primo y devolver el proximo numero primo <br>
    <form action=funciones.php method="post">
        <input type="number" name="numero" min="0" autofocus><br>
        <input type="submit" value="Aceptar">
    </form> 
    <?php
        } else {
            $numero = $_POST['numero'];
            if (esPrimo($numero)) {
                echo "El $numero es primo.";
            } else {
                echo "El $numero no es primo.";
            }

            $primo = siguientePrimo($numero);
            echo "<br>El siguiente numero primo es $primo <br>";
        }
    ?>
    <?php
    if (!isset($_REQUEST['base'])) {
        echo "<p>Introduce la base y el exponente</p>";
        ?>
        <form action=funciones.php method="post">
            <input type="number" name="base" min="0" autofocus><br>
            <input type="number" name="exponente" min="0" autofocus><br>
            <input type="submit" value="Aceptar">
        </form> 
        <?php
    }else{
        $base = $_REQUEST['base'];
        $exp = $_REQUEST['exponente'];
        $pot = potencia($base,$exp);
        echo "La potencia de base $base con exp $exp es $pot <br>";
    }

    if (!isset($_REQUEST['digito'])) {
        ?>
        Introduce un número para calcular cuantos digitos tiene.
        <form action="" method="post">
            <input type="number" name="digito" min="0" autofocus>
            <input type="submit" value="Aceptar">
        </form>
        <?php
    }else{
        $digito = $_REQUEST['digito'];
        $cantidad = digito($digito);
        echo "La cantidad de digitos del número $digito es $cantidad <br> ";
    }
    ?>
    <?php
    if (!isset($_REQUEST['numero2'])) {
        ?>
        Introduce un número para devolver el digito de la posicion que indiques.
        <form action="" method="post">
            <input type="number" name="numero2" min="0" autofocus>
            <input type="number" name="position" min="0" autofocus>
            <input type="submit" value="Enviar">
        </form>
        <?php        
    }else{
        $numero2 =$_REQUEST['numero2'];
        $position =$_REQUEST['position'];
        $nuevo = digitoN($numero2,$position);

        echo "El dígito indicado del número $numero2 es $nuevo <br>";
    }
    ?>

    <?php
    if (!isset($_REQUEST['numero3'])) {
        ?>
        Introduce un número y el digito que deseas buscar.
        <form action="" method="post">
            <input type="number" name="numero3" id="">
            <input type="number" name="digitoBuscar" id="">
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $numero3 = $_REQUEST['numero3'];
        $digitoBuscar = $_REQUEST['digitoBuscar'];

        $res = posicionDeDigito($numero3,$digitoBuscar);
        echo "El digito $digitoBuscar se encuentra en la posición $res del número $numero3 <br>";
    }
    ?>

    <?php
    if (!isset($_REQUEST['recortar'])) {
    ?>
        Introduce un número y la cantidad de digitos a recortar por detras
        <form action="" method="post">
            <input type="number" name="recortar" id="">
            <input type="number" name="cantRecorte" id="">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }else{
        $recortar = $_REQUEST['recortar'];
        $cantRec = $_REQUEST['cantRecorte'];
        $recortado = quitaPorDetras($recortar, $cantRec);
        echo "El nuevo número es $recortado <br>";
    }
    ?>

<?php
    if (!isset($_REQUEST['recortar2'])) {
    ?>
        Introduce un número y la cantidad de digitos a recortar por delante
        <form action="" method="post">
            <input type="number" name="recortar2" id="">
            <input type="number" name="cantRecorte2" id="">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }else{
        $recortar2 = $_REQUEST['recortar2'];
        $cantRec2 = $_REQUEST['cantRecorte2'];
        $recortado2 = quitaPorDelante($recortar2, $cantRec2);
        echo "El nuevo número es $recortado2 <br>";
    }
    ?>

<?php
    if (!isset($_REQUEST['pega'])) {
        ?>
        Introduce un número y el digito a pegar por detras
        <form action="" method="post">
            <input type="number" name="pega" id="">
            <input type="number" name="dig" id="">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }else{
        $pega=$_REQUEST['pega'];
        $dig = $_REQUEST['dig'];
        $nuevoN = pegaPorDetras($pega, $dig);
        echo "El nuevo número es $nuevoN <br>";
    }
?>

<?php
    if (!isset($_REQUEST['pega2'])) {
        ?>
        Introduce un número y el digito a pegar por delante
        <form action="" method="post">
            <input type="number" name="pega2" id="">
            <input type="number" name="dig2" id="">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }else{
        $pega2=$_REQUEST['pega2'];
        $dig2 = $_REQUEST['dig2'];
        $nuevoN2 = pegaPorDelante($pega2, $dig2);
        echo "El nuevo número es $nuevoN2 <br>";
    }
?>

<?php
    if (!isset($_REQUEST['quitarN'])) {
        ?>
        Introduce un número y la posicion delante y detras a recortar.
        <form action="" method="post">
            Numero <input type="number" name="quitarN" id="">
            Inicio <input type="number" name="delante" id="">
            Fin <input type="number" name="detras" id="">
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $quitarN = $_REQUEST['quitarN'];
        $inicio = $_REQUEST['delante'];
        $fin = $_REQUEST['detras'];

        $quitarN = trozoDeNumero($quitarN, $inicio,$fin);
        echo "El nuevo número es $quitarN <br>";
    }
?>

<?php
    if (!isset($_REQUEST['n1'])) {
        ?>
        Introduce dos numeros con los que formaremos uno.
        <form action="" method="post">
            <input type="number" name="n1" id="">
            <input type="number" name="n2" id="">
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $n1 = $_REQUEST['n1'];
        $n2 = $_REQUEST['n2'];
        $pegar = juntaNumeros($n1, $n2);
        echo "El nuevo número es $pegar <br>";
    }
?>
</body>
</html>
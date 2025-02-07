<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // Programa principal //////////////////////////////////////////////////// 
    if (!isset($_POST['numero'])) {
    ?>
        Introduzca un número para saber si es primo o no.<br>
        <form action=ejemploPrimos.php method="post">
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
    }
    // Funciones ///////////////////////////////////////////////////////////// 
    function esPrimo($n){
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        // El 0 y el 1 no se consideran primos  
        if (($n == 0) || ($n == 1)) {
            return false;
        }
        return true;
    }
    ?>
</body>

</html>
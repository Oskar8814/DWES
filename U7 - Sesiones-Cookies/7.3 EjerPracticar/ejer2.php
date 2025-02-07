<!-- Realiza un programa  que vaya pidiendo números  hasta que se introduzca un numero negativo y nos diga 
cuantos números se han introducido, la media de los impares y el mayor de los pares. El número negativo sólo 
se utiliza para indicar el final de la introducción de datos pero no se incluye en el cómputo. Utiliza sesiones. -->
<?php
session_start();
if (!isset($_SESSION['numeros'])) {
    $_SESSION['numeros'] = [];
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
    <form action="" method="post">
        Introduce un número (negativo para terminar): <input type="number" name="numero" autofocus><br>
        <input type="submit" value="Añadir">
    </form>
    <?php
        if (isset($_REQUEST['numero'])) {
            if ($_REQUEST['numero']>=0) {
                $_SESSION['numeros'][] = $_REQUEST['numero']; //Añadimos el numero a la session de numeros (Un array de numeros);
            }else{
                $cantidad = count($_SESSION['numeros']);
                $impares = [];
                $pares = [];

                //Separar los pares de los impares
                foreach ($_SESSION['numeros'] as $key => $value) {
                    if ($value % 2 == 0) {
                        $pares [] = $value;
                    }else{
                        $impares[] = $value;
                    }
                }

                //Obtener la media delos impares
                $totalImpares = 0;
                foreach ($impares as $key => $value) {
                    $totalImpares += $value;
                }
                $mediaImpares = $totalImpares / count($impares);
                
                //Obtner el mayor numero par
                $mayorPar = 0;
                foreach ($pares as $key => $value) {
                    if ($value>$mayorPar) {
                        $mayorPar = $value;
                    }
                }
                echo "La cantidad de numeros introducidos es $cantidad <br>";
                echo "La media de los números impares es $mediaImpares <br>";
                echo "El mayor número par es $mayorPar <br>";
                session_destroy();
                header("refresh: 6;");
            }
        }
    ?>
</body>
</html>
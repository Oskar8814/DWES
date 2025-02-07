<!-- Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras su suma no 
supere  el valor  10000. Cuando esto último ocurra, se debe mostrar el total acumulado, el contador de los 
números introducidos y la media. Utiliza sesiones. -->
<?php
    session_start();
    if (!isset($_SESSION['serie'])) {
        $_SESSION['serie'] = 0;
        $_SESSION['contador']= 0; 
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
        Introduce un número: <input type="number" name="numero" id="">
        <input type="submit" value="Añadir">
    </form>
    <?php
        if (isset($_REQUEST['numero'])) {

            $_SESSION['serie'] += $_REQUEST['numero'];//Va sumando el numero recogido por el formulario a la session (La sess es un numero)
            $_SESSION['contador']++;
            if ($_SESSION['serie']>10000) {
                $total = $_SESSION['serie'];
                $media = $total/$_SESSION['contador'];

                echo "El total acumulado es $total <br>";
                echo "La cantidad de números introducidos es {$_SESSION['contador']} <br>";
                echo "La media es $media <br>";

                session_destroy();
                header("refresh: 6;");
            }
        }
    ?>
</body>
</html>
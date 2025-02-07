<!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A 
priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir 
los datos cuando meta un número negativo. Utiliza sesiones. -->
<?php session_start(); // Inicio de sesión 
    if (!isset($_SESSION['numeros'])) {
        $_SESSION['numeros'] = 0;
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
        Introduce un numero(Negativo para terminar): <input type="number" name="numero" id="">
        <input type="submit" value="Añadir">
    </form>
    <?php
    if (isset($_REQUEST['numero'])) {
        $numero = $_REQUEST['numero'];
        
        if ($numero>=0) {
            $_SESSION['numeros']  += $numero;
            $_SESSION['contador']++;
        }else {
            $media = $_SESSION['numeros']/$_SESSION['contador'];
            echo "La media sería $media.";
            session_destroy();
            header("refresh: 3;"); // refresca la página
        }
    }
    
    ?>
</body>
</html>
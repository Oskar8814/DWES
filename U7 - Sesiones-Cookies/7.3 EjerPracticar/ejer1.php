<!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A 
priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir 
los datos cuando meta un número negativo. Utiliza sesiones. -->
<?php
    if ( session_status()  == PHP_SESSION_NONE)  {  session_start();  }
    if (!isset($_SESSION['usuario'])) {
        header('location:ejer4.php');  
    }
    if($_SESSION['usuario']==="Oscar" & $_SESSION['pass']==="1234"){
        if (!isset($_SESSION['numeros'])) {
            $_SESSION['numeros'] = [];
        }
        if (isset($_REQUEST['cerrar'])) {
            session_destroy();
            header("location:ejer1.php");
        }
    }else{
        header('location:ejer4.php'); 
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
            $_SESSION['numeros'] [] = $numero;
        }else {
            // $numeros = $_SESSION['numeros'];
            $total = 0;
            foreach ($_SESSION['numeros'] as $key => $value) {
                $total += $value;
            }
            $media = $total/ count($_SESSION['numeros']);
            echo "La media sería $media.";
            
            //Formulario para cerrar la sesion
            ?>
                <form action="" method="post">
                    <input type="submit" value="Cerrar">
                    <input type="hidden" name="cerrar">
                </form>
            <?php
        }
    }
    
    ?>
</body>
</html>
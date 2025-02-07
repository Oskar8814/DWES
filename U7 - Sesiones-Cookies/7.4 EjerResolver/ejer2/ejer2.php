<!-- Crear una página que simula una encuesta. Se realizará una pregunta, con dos botones para responder, 
cada vez que se pulse un botón se irán contabilizando (usa sesiones) los votos y actualizando una barra que muestre el número de votos de cada respuesta. 
Este resultado se irá almacenando también en una cookie, de manera que si se cierra el navegador, al abrir la página de nuevo se mostrarán los resultados 
hasta el momento en que se cerró. Crear la cookie para 3 meses. -->

<?php
session_start();

if (isset($_REQUEST['reiniciar'])) {
    $duracion = strtotime("+3months"); //3 Meses
    setcookie("si","",time()-$duracion);
    setcookie("no","",time()-$duracion);

    // unset($_SESSION['si'] );
    // unset($_SESSION['no'] );
    
    session_destroy();
    
    header('refresh:0');
}

if (isset($_COOKIE['si'])) {
    $_SESSION['si'] = $_COOKIE['si'];
}
if (isset($_COOKIE['no'])) {
    $_SESSION['no'] = $_COOKIE['no'];
}

if (isset($_REQUEST['si']) ) {
    if (isset($_SESSION['si'])) {
        $_SESSION['si']++;
        $duracion = 3 * 30 * 24 * 60 * 60; //3 Meses
        setcookie("si",$_SESSION['si'],time()+$duracion);
    }else{
    $_SESSION['si'] = 1;
    setcookie("si",$_SESSION['si'],strtotime("+3 months"));
    }  
}

if (isset($_REQUEST['no'])) {
    if (isset($_SESSION['no'])) {
        $_SESSION['no']++;
        $duracion = 3 * 30 * 24 * 60 * 60; //3 Meses
        setcookie("no",$_SESSION['no'],time()+$duracion);
    } else {
        $_SESSION['no'] = 1;
        setcookie("no",$_SESSION['no'],time()+3 * 30 * 24 * 60 * 60);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            height: 20px;
            width: 20px;
        }
        form{
            display: inline;
        }
    </style>
</head>
<body>

    <h2>Resultados</h2>
    <?php
        echo "Si:";
        if (isset($_SESSION['si'])) {
            $aux = $_SESSION['si'];
            for ($i=0; $i < $aux ; $i++) { 
                ?>
                <img src="img/green_circle.jpg" alt="verde">
                <?php
            }
        }
        echo "<br> No:";
        if (isset($_SESSION['no'])) {
            $aux2 = $_SESSION['no'];
            for ($i=0; $i < $aux2 ; $i++) { 
                ?>
                <img src="img/red_circle.jpg" alt="rojo">
                <?php
            }
        }
    ?>

    <h2>La tortilla de patatas con o sin cebolla:</h2>
    <form action="" method="post">
        <input type="submit" value="Si">
        <input type="hidden" name="si">
    </form>

    <form action="" method="post">
        <input type="submit" value="No">
        <input type="hidden" name="no">
    </form>
    <br><br>
    <form action="" method="post">
        <input type="submit" value="Reiniciar Votaciones">
        <input type="hidden" name="reiniciar">
    </form>



</body>
</html>
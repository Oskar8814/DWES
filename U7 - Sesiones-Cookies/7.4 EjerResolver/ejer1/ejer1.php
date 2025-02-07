<!-- Crear una página principal con un botón 'Añadir color' para generar un color aleatorio que además se establecerá como color de fondo de la página,
cada vez que se pulsa irá generando un color nuevo (actualizando el fondo), que se irán almacenando en un array de sesión. 
Habrá un segundo botón 'Mostrar paleta creada' que dirige a una segunda página que mostrará una paleta con los colores generados. 
Esta paleta no es más que una tabla con un máximo de 5 celdas por cada fila, y en cada celda se muestra un color de los generados. 
Debajo de la tabla tendremos 2 botones uno para volver a la página principal y seguir añadiendo colores a la paleta 
y otro para destruir la sesión y generar una paleta nueva. Además al pulsar en cada celda de la tabla el color de fondo de la página 
cambiará al color de la celda pulsada. -->
<?php
session_start();
if (isset($_REQUEST['generaColor'])) {
    $backgroundColor = $_REQUEST['generaColor'];
    $_SESSION['paleta'] [] = $_REQUEST['generaColor'];
}

if (isset($_REQUEST['color'])) {
    $backgroundColor = $_REQUEST['color'];
}

if (isset($_REQUEST['eliminar'])) {
    unset($_SESSION['paleta']);
    session_destroy();
    header('refresh:0');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?= $backgroundColor ?>;
        }
    </style>
</head>
<body>
    <?php
    $randR = rand(0,255);
    $randG = rand(0,255);
    $randB = rand(0,255);
    
    $color = 'rgb(' . $randR . ', ' . $randG . ', ' . $randB . ')';
    
    if (isset($_SESSION['paleta'])) {
        echo "Colores creados: " . count($_SESSION['paleta']);
    }
    ?>
    
    <form action="#" method="post">
        <label for="color">Genera un color:</label>
        <input type="submit" value="Añadir color">
        <input type="hidden" name="generaColor" value="<?= $color ?>">
    </form>
    <br>
    <form action="paleta.php" method="post">
        <input type="submit" value="Volver">
        <input type="hidden" name="color" value="<?= $backgroundColor ?>" >
    </form>
</body>
</html>
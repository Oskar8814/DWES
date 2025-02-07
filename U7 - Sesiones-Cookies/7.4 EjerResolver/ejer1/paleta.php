<!-- Esta paleta no es más que una tabla con un máximo de 5 celdas por cada fila, y en cada celda se muestra un color de los generados. 
Debajo de la tabla tendremos 2 botones uno para volver a la página principal y seguir añadiendo colores a la paleta 
y otro para destruir la sesión y generar una paleta nueva. Además al pulsar en cada celda de la tabla el color de fondo de la página 
cambiará al color de la celda pulsada.  -->

<?php
session_start();
if (!isset($_SESSION['paleta'])) {
    header('location:ejer1.php');
}

if (isset($_REQUEST['color'])) {
    $backgroundColor = $_REQUEST['color'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            width: 150px;
            height: 150px;
            border: 1px solid black;
        }
        a{
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
        }
        body{
            background-color: <?= $backgroundColor ?>;
        }
    </style>
</head>
<body>
    <table>
        <?php
        for ($i=0; $i < count($_SESSION['paleta']) ; $i++) {
            if ($i % 5 === 0) {
                echo "<tr>";
            }
            ?>
                <td style="background-color: <?= $_SESSION['paleta'][$i];?>"><a href="paleta.php?color=<?= $_SESSION['paleta'][$i]; ?>"></a></td>
            <?php
            if ($i+1 % 5 === 0) {
                echo "</tr>";
            }
        }
        ?>
    </table>
    <!-- formulario para eliminar la paleta de colores -->
    <form action="ejer1.php" method="post">
        <input type="submit" value="Eliminar la paleta">
        <input type="hidden" name="eliminar">
    </form>
    <a href="ejer1.php?color=<?= $backgroundColor ?>">Crear nueva paleta</a>
</body>
</html>
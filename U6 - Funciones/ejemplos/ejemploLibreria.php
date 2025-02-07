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

    if (!isset($_POST['numero'])) {
    ?>
    Introduzca un número para saber si es primo o no.<br>
    <form action=ejemploLibreria.php method="post">
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
    ?>
</body>
</html>
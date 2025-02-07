<!-- Pedir al usuario su fecha de nacimiento y una fecha futura, y mostrar la edad que tendrá en esa 
fecha (un año tiene 60*60*24*365.25 segundos)  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Fecha de nacimiento y Futuro</h3>
    <form action="" method="post">
        <input type="date" name="nacimiento" id=""><br>
        <input type="date" name="futuro" id=""><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (isset($_REQUEST['nacimiento'])) {
            $nacimiento=$_REQUEST['nacimiento'];
            $futuro = $_REQUEST['futuro'];
            
            $nacimientoTime = strtotime($nacimiento);
            $futuroTime = strtotime($futuro);

            $diferencia = $futuroTime - $nacimientoTime;
            $edad = (int) ($diferencia/( 60*60*24*365.25));
            echo "En la fecha $futuro tendrás $edad años";
        }
    ?>

</body>
</html>
<!-- Pedir la fecha de nacimiento y el nombre de dos personas y mostrar la edad de cada una, así 
como el nombre de la persona mayor.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nombre 1º Persona: <input type="text" name="nombre1" id="">
        Fecha de Nacimiento: <input type="date" name="nacimiento1" id=""><br>
        Nombre 2º Persona: <input type="text" name="nombre2" id="">
        Fecha de Nacimiento: <input type="date" name="nacimiento2" id=""><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['nombre1'])) {
            $nombre1 = $_REQUEST['nombre1'];
            $nacimiento1 = $_REQUEST['nacimiento1'];
            $nombre2 = $_REQUEST['nombre2'];
            $nacimiento2 = $_REQUEST['nacimiento2'];

            $hoy = time();
            $nacimiento1Time = strtotime($nacimiento1);
            $nacimiento2Time = strtotime($nacimiento2);

            $vivido1 = $hoy-$nacimiento1Time;
            $vivido2 = $hoy-$nacimiento2Time;

            $edad1 = $vivido1/(60 * 60 * 24 * 365.25);
            $edad2 = $vivido2/(60 * 60 * 24 * 365.25);

            if ($edad1>$edad2) {
                echo "$nombre1 es mayor <br>";
                echo "$nombre1 tiene $edad1 años <br>";
                echo "$nombre2 tiene $edad2 años <br>";
            }else{
                echo "$nombre2 es mayor <br>";
                echo "$nombre1 tiene $edad1 años <br>";
                echo "$nombre2 tiene $edad2 años <br>";
            }
        }
    ?>
</body>
</html>
<!-- Mostrar el día de la semana que correspondería, una vez transcurridos un número de años, 
meses, y días elegidos por el usuario, a partir de la fecha actual. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Dias: <input type="number" name="dia" id="" ><br>
        Mes: <input type="number" name="mes" id="" ><br>
        Año: <input type="number" name="año" id="" ><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['dia'])) {
            $dia = (int) $_REQUEST['dia'];
            $mes = (int) $_REQUEST['mes'];
            $anio = (int) $_REQUEST['año'];

            $fechaFinal = strtotime("+ $anio year $mes month $dia days");
            $fechaFinalFormat = date("d/m/Y",$fechaFinal);
            
            echo "$fechaFinalFormat";
        }
    ?>
</body>
</html>
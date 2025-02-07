<!--Pedir una fecha en un formulario con un input de fecha y mostrar a que día de la semana corresponde (en español). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="fecha" id="">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['fecha'])) {
            $fecha = $_REQUEST['fecha'];
            $fechaTime = strtotime($fecha);
            $diasSemana = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];

            $diaSemana = date("w",$fechaTime);

            echo "El dia de la semana es $diasSemana[$diaSemana]";
        }
    ?>
</body>
</html>
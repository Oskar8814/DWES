<!-- Pedir una fecha en un formulario con un input de fecha y mostrarla en el formato “12 de Enero de 2018” (en español) -->
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
            $date = $_REQUEST['fecha'];
            $fechaTime = strtotime($date);
            $meses = [" ","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

            $mes = date("n",$fechaTime);
            $dia = date("j",$fechaTime);
            $anio = date("Y",$fechaTime);

            echo "$dia de $meses[$mes] de $anio";
        }
    ?>
</body>
</html>
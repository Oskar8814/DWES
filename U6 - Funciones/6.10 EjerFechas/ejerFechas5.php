<!-- Pedir un día de la semana en un formulario, seleccionándolo desde una lista desplegable. 
Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Elige el día de la semana</h3>
    <form action="" method="post">
        <select name="dias" required>
            <option value="monday">Lunes</option>
            <option value="tuesday">Martes</option>
            <option value="wednesday">Miércoles</option>
            <option value="thursday">Jueves</option>
            <option value="friday">Viernes</option>
            <option value="saturday">Sábado</option>
            <option value="sunday">Domingo</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['dias'])) {
            $diaSemana = $_REQUEST['dias'];
            $diaSiguiente = strtotime("next $diaSemana");
            $fecha = date("d/m/Y",$diaSiguiente);
            $diaEsp = ["monday"=>"Lunes", "tuesday"=>"Martes", "wednesday"=>"Miercoles","thursday"=>"Jueves","friday"=>"Viernes","saturday"=>"Sabado","sunday"=>"Domingo",
        ];
            echo "El proximo $diaEsp[$diaSemana] es $fecha";
        }
    ?>
</body>
</body>
</html>
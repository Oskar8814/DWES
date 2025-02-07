<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['horas'])) {
        $horas = $_REQUEST['horas'];
        if ($horas <= 40) {
            $sueldo = $horas * 12;
        } else {
            $sueldo = 40 * 12;
            $sueldo += ($horas - 40) * 16;
        }
        echo "<h3>El sueldo del empleado asciende a $sueldo €</h3>";
    }else{
        echo "<h1>Ingresa la cantidad de horas trabajadas</h1>";
    }
    
    ?>
    <form action="" method="post">
        <input type="number" name="horas">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
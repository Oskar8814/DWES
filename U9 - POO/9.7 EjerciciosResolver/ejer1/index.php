<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    include_once 'Empleado.php';
    $empleado = new Empleado("Antonio",2000);
    $empleado ->impuestos();
    echo "<br>";
    $empleado2 = new Empleado("Pepe",3400);
    $empleado2 ->impuestos();
    ?>
</body>
</html>
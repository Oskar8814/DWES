<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $x = 24;
    $pi = 3.1416;
    $animal = "conejo";
    $saludo = "hola caracola";
    echo $x, "<br>", $pi, "<br>", $animal, "<br>", $saludo;
    // print_r(get_defined_vars());
    var_dump(get_defined_vars())
    ?>
</body>

</html>
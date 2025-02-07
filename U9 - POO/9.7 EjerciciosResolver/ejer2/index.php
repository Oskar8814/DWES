<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Menu.php';
    $menu = new Menu("Google","https://www.google.com/");
    $menu->anadirTitulo("Wikipedia","https://es.wikipedia.org/wiki/Wikipedia:Portada");
    $menu->mostrarHorizontal();
    echo "<br>";
    $menu->mostrarVertical();
    ?>
</body>
</html>
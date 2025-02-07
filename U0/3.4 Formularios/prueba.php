<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Formulario</title>
</head>
<body>
Introduce tu nombre:
    <form action="saluda.php" method="get">
        <input type="text" name="nombre"><br>
        <input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        $nombre = 'Antonio';
        $edad = 33;
    ?>
    <a href="saluda.php?nombre=Antonio&edad=33">Saludar</a><br><!-- Seria otra forma de enviar los datos mediante un enlace y posteriormente insertando la variable en el enlace desde codigo php -->
    <a href="saluda.php?nombre=<?= $nombre ?>&edad=<?= $edad ?>">Saludar</a> 
</body>
</html>
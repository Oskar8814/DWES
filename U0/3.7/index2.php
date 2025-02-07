<!-- Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la combinación de 6
números entre 1 y 49 y el número de serie entre 1 y 999. Mostrar la combinación generada y la introducida por
el usuario en dos filas de una tabla. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="loteria.php" method="post">
        <label for="n1">Número 1</label>
        <input type="number" name="n1" min="1" max="49"><br><br>
        <label for="n1">Número 2</label>
        <input type="number" name="n2" min="1" max="49"><br><br>
        <label for="n1">Número 3</label>
        <input type="number" name="n3" min="1" max="49"><br><br>
        <label for="n1">Número 4</label>
        <input type="number" name="n4" min="1" max="49"><br><br>
        <label for="n1">Número 5</label>
        <input type="number" name="n5" min="1" max="49"><br><br>
        <label for="n1">Número 6</label>
        <input type="number" name="n6" min="1" max="49"><br><br>
        <label for="serie">Número de Serie</label>
        <input type="number" name="serie" min="1" max="999"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
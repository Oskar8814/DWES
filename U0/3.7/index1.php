<!-- EJERCICIO Nº 1
Diseñar un formulario web que pida la altura y el diámetro de un cilindro. Una vez el usuario introduzca los
datos y pulse el botón calcular, deberá calcularse el volumen del cilindro y mostrarse el resultado en el
navegador. Mostrar la imagen de un cilindro junto al resultado y un título "Calculo del volúmen de un cilindro",
intenta dar un aspecto agradable a la página de resultado.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calculaVolumen.php" method="post">
        <label for="altura">Introduce la altura del cilindro</label>
        <input type="numer" name="altura" step="0.1"><br><br>
        <label for="diametro">Introduce el diametro del cilindro</label>
        <input type="number" name="diametro" step="0.1"><br><br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
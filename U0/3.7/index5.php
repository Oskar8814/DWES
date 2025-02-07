<!-- Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, 
que debe llenar de aceite a través de una toma con cierto caudal disponible. 
Se desea crear una aplicación web que le indique cuánto tiempo transcurrirá hasta el llenado del depósito. 
Para calcular dicho tiempo el usuario introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). 
Una vez introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fábrica</title>
</head>
<body>
    <form action="fabrica.php" method="post">
        <fieldset>
            <legend>Datos del cilindro y caudal</legend>
            <label for="diametro">Introduce el diámetro</label>
            <input type="number" name="diametro" id="diametro" step="0.01" required>
            <label for="diametro">Introduce la altura</label>
            <input type="number" name="altura" id="altura" step="0.01" required>
            <label for="diametro">Introduce el caudal</label>
            <input type="number" name="caudal" id="caudal" step="0.01" required><br><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>
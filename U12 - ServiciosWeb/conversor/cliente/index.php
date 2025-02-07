<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>
<body>
    <form action="peticion.php" method="post">
        <label for="cantidad">Introduce la cantidad:</label>
        <input type="number" name="cantidad" id="cantidad">
        <label for="conversion">Selecciona el tipo de conversión</label>
        <select name="conversion" id="conversion">
            <option value="1">Euros a Pesetas</option>
            <option value="2">Pesetas a Euros</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
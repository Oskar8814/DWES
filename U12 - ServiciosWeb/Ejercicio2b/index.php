<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Star Wars</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1>Información de Star Wars</h1>
    <form action="films.php" method="post">
        <input type="submit" value="Peliculas">
        <input type="hidden" name="peliculas">
    </form>
    <form action="people.php" method="post">
        <input type="submit" value="Personajes">
        <input type="hidden" name="personajes">
        <input type="hidden" name="pagina" value="1">
    </form>
    <form action="planet.php" method="post">
        <input type="submit" value="Planetas">
        <input type="hidden" name="planetas">
    </form>
    <form action="starships.php" method="post">
        <input type="submit" value="Naves Espaciales">
        <input type="hidden" name="naves">
    </form>
    <form action="vehicles.php" method="post">
        <input type="submit" value="Vehiculos">
        <input type="hidden" name="vehiculos">
    </form>
</body>
</html>
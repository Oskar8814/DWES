<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../View/css/nuevo.css">
</head>
<body>
    <h1>Añadir un nuevo Articulo al Blog</h1>
    <form action="../Controller/grabaArticulo.php" method="post">
        <label for="">Titulo</label>
        <input type="text" name="titulo" id=""><br>
        <label for="">Contenido</label>
        <textarea name="contenido" id=""></textarea><br>
        <input type="submit" value="Añadir">
        <a href="../Controller/index.php">Volver</a>
    </form>
</body>
</html>
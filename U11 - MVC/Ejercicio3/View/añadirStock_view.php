<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Producto <?= $data['avion']->getNombre() ?></h1>
    <img src="../View/<?= $data['avion']->getImagen() ?>" alt="Imagen de Avion" width="150px">
    <p>Stock actual <?= $data['avion']->getStock() ?></p>
    <form action="" method="post">
        <label for="">Stock que se va a añadir:</label>
        <input type="number" name="stock" id=""><br>
        <input type="submit" value="Añadir">
        <input type="hidden" name="restock" value="<?= $data['avion']->getCodigo() ?>">
    </form>
</body>
</html>
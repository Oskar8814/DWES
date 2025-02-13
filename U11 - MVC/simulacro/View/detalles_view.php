<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalles de la imagen</h1>
    <img src="../View/imagen/<?= $foto->getImagen() ?>" alt="">
    <h3>Autor: <?= $usuario->getNombre() ?></h3>
    <hr>
    <h3>Usuarios que han dado like:</h3>
    <?php
    foreach ($usuarios as $usuario) {
        ?>
        <p><?= $usuario->getNombre() ?></p>
        <?php
    }
    ?>
    <hr>
    <form action="../Controller/index.php" method="post">
        <input type="submit" value="Pagina Principal">
    </form>
</body>
</html>
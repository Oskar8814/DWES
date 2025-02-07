<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../View/css/index2.css">
</head>

<body>
    <h1>Blog Personal</h1>
    <a class="add" href="../Controller/añadirArticulo.php">Añadir un articulo</a>
    <div class="card-container">
        <?php

        foreach ($data['articulos'] as $articulo) {
        ?>
            <div class="card">
                <h3><?= $articulo->getTitulo() ?></h3>
                <br>
                <p ><?= nl2br($articulo->getContenido()) ?></p>
                <br>
                <p>Fecha de publicación <?= $articulo->getFechaHora() ?></p>
                <br>
                <a class="delete" href="../Controller/borrarArticulo.php?codigo=<?= $articulo->getCodigo() ?>">Borrar</a>
                <a class="modify" href="../Controller/modificarArticulo.php?codigo=<?= $articulo->getCodigo() ?>">Modificar</a>
            </div>
        <?php
        }
        ?>
    </div>
    <footer>Derechos reservados</footer>
</body>

</html>
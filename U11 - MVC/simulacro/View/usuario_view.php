<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <h1>Perfil del usuario <?= $_SESSION['usuario'] ?></h1>
    <form action="" method="post" style="display: inline;">
        <input type="submit" value="Cerrar Sesión" name="cerrar">
    </form>
    <form action="../Controller/index.php" method="post" style="display: inline;">
        <input type="submit" value="Pagina Principal">
    </form>
    <!-- <form action="" method="post">
        <input type="text" name="imagen" id="">
        <input type="submit" value="Subir">
    </form> -->
    <form action="#" enctype="multipart/form-data" method="post">
            <input type="file" name="imagen_file" accept="image/*" required>
            <input type="submit" value="Añadir" name="img">
        </form>
    <hr>

    <?php
    foreach ($data['fotos'] as $foto) {
        $cantidad = Like::cuentaLikes($foto->getId());
        ?>
        <img src="../View/imagen/<?= $foto->getImagen() ?>" alt="">
        <p>Likes acumulados:<?= $cantidad ?></p>
        <form action="../Controller/eliminarFoto.php" method="post">
            <input type="hidden" name="idfoto" value="<?= $foto->getId() ?>">
            <input type="submit" value="Borrar">
        </form>
        <hr>
        <?php
    }
    ?>
</body>
</html>
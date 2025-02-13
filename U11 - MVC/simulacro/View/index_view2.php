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
        table,th,td{
            border: solid 1px black;
            width:40%;
            text-align: center;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <table>
        <tr><th colspan="4"><a href="../Controller/usuario.php"><?= $_SESSION['usuario'] ?></a></th></tr>
        <tr><th>IMAGEN</th><th>autor</th><th>likes</th><th>votar</th></tr>
        <?php
        foreach ($data['fotos'] as $foto) {
            ?>
            <tr>
            <td><a href="../Controller/detalles.php?id=<?= $foto->getId() ?>"><img src="../View/imagen/<?= $foto->getImagen()?>" alt=""></a></td>
            <?php
            $usuario = Usuario::getUsuarioById($foto->getId_usuario());
            $cantidad = Like::cuentaLikes($foto->getId());
            ?>
            <td><?= $usuario->getNombre() ?></td>
            <td><?= $cantidad ?></td>
                <?php
                $usuarioAux = Usuario::getUsuarioByName($_SESSION['usuario']);
                $liked = Like::compruebaLike($foto->getId(),$usuarioAux->getId());
                if ($liked) {
                    ?>
                    <td>Me gusta</td>
                    <?php
                }else {
                    ?>
                    <td>
                        <form action="" method="post">
                            <input type="submit" value="Dar like" name="darlike">
                            <input type="hidden" name="idfoto" value="<?= $foto->getId() ?>">
                            <input type="hidden" name="idusuario" value="<?= $usuarioAux->getId() ?>">
                        </form>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>

    </table>

</body>
</html>
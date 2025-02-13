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
        <tr><th colspan="3"><a href="../Controller/login.php">Inicio de Sesion/Registro</a></th></tr>
        <tr><th>IMAGEN</th><th>autor</th><th>likes</th></tr>
        <?php
        foreach ($data['fotos'] as $foto) {
            ?>
            <tr>
            <td><img src="../View/imagen/<?= $foto->getImagen() ?>" alt=""></td>
            <?php
            $usuario = Usuario::getUsuarioById($foto->getId_usuario());
            $cantidad = Like::cuentaLikes($foto->getId());
            ?>
            <td><?= $usuario->getNombre() ?></td>
            <td><?= $cantidad ?></td>
            </tr>
            <?php
        }
        ?>

    </table>

</body>
</html>
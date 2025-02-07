<?php
include_once 'Nota.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:index.php');
}

if (!isset($_SESSION['notas'])) {
    $_SESSION['notas']=[];
}

if (isset($_REQUEST['titulo']) && isset($_REQUEST['texto'])) {
    // $_SESSION['notas'][$_SESSION['usuario']] [] =  new Nota ($_REQUEST['titulo'],$_REQUEST['texto']); Debe ir serializado como abajo
    $_SESSION['notas'][$_SESSION['usuario']] [] =  base64_encode(serialize(new Nota ($_REQUEST['titulo'],$_REQUEST['texto'])));
}

if (isset($_REQUEST['cerrar'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['contraseña']);
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,th,tr,table{
            border: 1px, solid, black;
        }
        
    </style>
</head>
<body>
    <h1>Panel de notas del usuario <?= $_SESSION['usuario'] ?></h1>

    <?php
    if (Nota::getUltima()=="") {
        echo "Ninguna nota ingresada <br>";
    }else {
        $fechaStr = date("d-m-Y H:i:s", Nota::getFecha());
        ?>
        <h3><?= Nota::getUltima() ?></h3>
        <h3><?= $fechaStr ?></h3>
        <?php
    }
    ?>

    <table>
        <tr>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>

        <?php
        foreach ($_SESSION['notas'] as $key => $notas) {
            if ($key == $_SESSION['usuario']) {
                foreach ($notas as $key => $nota) {
                    $nota = unserialize(base64_decode($nota));
                    $fechaStr = date("d/m/Y", $nota->getCreacion());
                    $horaStr = date("H:i:s", $nota->getCreacion());
                    ?>
                        <tr>
                            <td><a href="principal.php?nota=<?= base64_encode(serialize($nota));?>"><?= $nota->getTitulo() ?></a></td>
                            <td><?= $fechaStr?></td>
                            <td><?= $horaStr ?></td>
                        </tr>
                    <?php
                }
                
            }
            
        }
        ?>
    </table>
    <?php
    if (isset($_REQUEST['nota'])) {
        $nota = unserialize(base64_decode($_REQUEST['nota']));;
        ?>
        <table>
            <tr>
                <th><?= $nota->getTitulo() ?></th>
            </tr>
            <tr>
                <!-- La funcion nl2br genera br cuando hayan saltos de linea -->
                <td><?= nl2br($nota->getTexto()) ?></td> 
            </tr>
            
        </table>
        <?php
    }
    ?>


    <h4>Añadir nueva nota</h4>
    <form action="" method="post">
        <label for="">Titulo</label>
        <input type="text" name="titulo" id=""><br>
        <label for="texto">Texto</label>
        <textarea name="texto" id=""></textarea><br>
        <input type="submit" value="Añadir">
    </form>

    <form action="" method="post">
        <input type="hidden" name="cerrar">
        <input type="submit" value="Cerrar Sesión">
    </form>
</body>
</html>
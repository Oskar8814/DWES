<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Perfil de administrador <?= $_SESSION['nombre'] ?></h1>

    <table>
        <tr>
            <th>Descripcion</th>
            <th>Profesor</th>
            <th>fecha</th>
            <th>Estado</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($data['incidenciasAdmin'] as $incidencia) {
        ?>
            <tr>
                <td><?= $incidencia->getDescripcion() ?></td>
                <td><?= $incidencia->getProfesor() ?></td>
                <td><?= $incidencia->getFecha() ?></td>
                <td><?= $incidencia->getEstado() ?></td>
                <td>
                    <?php
                    if ($incidencia->getEstado() == "REPARANDO") {
                    ?>
                        <form action="" method="post" >
                            <input type="submit" value="Finalizada">
                            <input type="hidden" name="finalizada"> 
                        </form>
                    <?php
                    } else {
                    ?>
                        <form action="" method="post" >
                            <input type="submit" value="Finalizada" disabled>
                            <input type="hidden" name="finalizada"> 
                        </form>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($incidencia->getEstado() == "PENDIENTE") {
                    ?>
                        <form action="" method="post">
                            <input type="submit" value="Reparar">
                            <input type="hidden" name="reparar"  value="1">
                            <input type="hidden" name="idIncidencia" value="<?= $incidencia->getId() ?>">
                        </form>
                    <?php
                    } elseif ($incidencia->getEstado() == "REPARANDO") {
                    ?>
                        <form action="" method="post">
                            <input type="submit" value="Soltar">
                            <input type="hidden" name="soltar"  value="1">
                            <input type="hidden" name="idIncidencia" value="<?= $incidencia->getId() ?>">
                        </form>
                    <?php
                    }
                    ?>

                </td>
            </tr>
        <?php
        }

        ?>
    </table>
    <form action="../Controller/historicoResueltas.php" method="post">
        <input type="submit" value="Historico de incidencias resueltas">
        <input type="hidden" name="historico">
    </form>
    <form action="" method="post">
        <input type="submit" value="Cerrar Session">
        <input type="hidden" name="cerrarSesion">

    </form>
</body>

</html>
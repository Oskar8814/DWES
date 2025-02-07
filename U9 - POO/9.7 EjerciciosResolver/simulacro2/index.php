<?php
include_once 'Reserva.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrar'])) {
    unset($_SESSION['usuario']);
    header('Location:login.php');
    setcookie("usuario", "", -1);
}

if ($_SESSION['usuario'] == null && isset($_SESSION['usuario'])) {
    header('Location:login.php');
}

if (!isset($_SESSION['reservas'][$_SESSION['usuario']])) {
    $_SESSION['reservas'][$_SESSION['usuario']] = [];
}

if (isset($_REQUEST['sala']) && isset($_REQUEST['fecha'])) {
    $sala = $_REQUEST['sala'];
    $fechaHora = strtotime($_REQUEST['fecha']); //CONVERTIR LA FECHA EN NUMERO

    $reserva = new Reserva($_SESSION['usuario'], $fechaHora, $sala);

    $_SESSION['reservas'][$_SESSION['usuario']][] = base64_encode(serialize($reserva));
}

if (isset($_REQUEST['confirmar'])) {
    $indice = $_REQUEST['confirmar'];
    $reserva = unserialize(base64_decode($_SESSION['reservas'][$_SESSION['usuario']][$indice]));
    $reserva->confirmar();
    Reserva:: setTotalPendientes(Reserva::getTotalPendientes()-1);
    $_SESSION['reservas'][$_SESSION['usuario']][$indice] = base64_encode(serialize($reserva));
}
if (isset($_REQUEST['cancelar'])) {
    $indice = $_REQUEST['cancelar'];
    $reserva = unserialize(base64_decode($_SESSION['reservas'][$_SESSION['usuario']][$indice]));
    $reserva->anular();
    Reserva:: setTotalPendientes(Reserva::getTotalPendientes()-1);

    $_SESSION['reservas'][$_SESSION['usuario']][$indice] = base64_encode(serialize($reserva));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,
        th,
        td,
        table {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h1>Bienvenid@ <?= $_SESSION['usuario'] ?></h1>
    <h3>Reservas pendientes: <?= Reserva::getTotalPendientes() ?></h3>

    <form action="" method="post">
        <label for="">Sala</label>
        <input type="text" name="sala" id="">
        <label for="">Fecha y Hora</label>
        <input type="datetime-local" name="fecha" id="">
        <input type="hidden" name="agregarReserva">
        <input type="submit" value="Agregar">
    </form>

    <!-- Select para elegir el filtrado de las reservas -->
    <form action="#" method="post">
            <input type="radio" name="filtrado" value="TODOS"> TODOS
            <input type="radio" name="filtrado" value="PENDIENTE"> PENDIENTES
            <input type="radio" name="filtrado" value="CONFIRMADA"> CONFIRMADAS
            <input type="radio" name="filtrado" value="CANCELADA"> ANULADAS
            <input type="submit" value="FILTRAR">
        </form>

    <table>
        <tr>
            <th colspan="4">Listado de Reservas</th>
        </tr>
        <tr>
            <th>Sala</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
        </tr>

        <?php
        foreach ($_SESSION['reservas'] as $key => $value) {

            if ($key == $_SESSION['usuario']) {
                foreach ($value as $key => $reserva) {
                    $reserva = unserialize(base64_decode($reserva));
                    if (isset($_REQUEST['filtrado']) && $_REQUEST['filtrado'] != "TODOS") {
                        $filtrado = $_REQUEST['filtrado'];
                        if ($reserva->getEstado() == $filtrado) {
                        ?>
                            <tr>
                                <td><?= $reserva->getSala() ?></td>
                                <td><?= $reserva->getFecha() ?></td>
                                <td><?= $reserva->getHora() ?></td>
                                <td><?= $reserva->getEstado() ?>
                                <td>
                                    <?php
                                    if ($reserva->getEstado() == "PENDIENTE") {
                                    ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="confirmar" <?= $key ?>>
                                            <input type="submit" value="confirmar">
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($reserva->getEstado() == "PENDIENTE") {
                                    ?>
                                        <!-- <a href="index.php?cancelar=<?= $key ?>">Cancelar</a> -->
                                        <form action="" method="post">
                                            <input type="hidden" name="cancelar" <?= $key ?>>
                                            <input type="submit" value="cancelar">
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </td>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                            <tr>
                                <td><?= $reserva->getSala() ?></td>
                                <td><?= $reserva->getFecha() ?></td>
                                <td><?= $reserva->getHora() ?></td>
                                <td><?= $reserva->getEstado() ?>
                                <td>
                                    <?php
                                    if ($reserva->getEstado() == "PENDIENTE") {
                                    ?>
                                        <a href="index.php?confirmar=<?= $key ?>">Confirmar</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($reserva->getEstado() == "PENDIENTE") {
                                    ?>
                                        <a href="index.php?cancelar=<?= $key ?>">Cancelar</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                </td>
                            </tr>
                        <?php
                    }
                }
            }
        }

        ?>
    </table>

    <br><br>
    <form action="" method="post">
        <input type="submit" value="Cerrar session">
        <input type="hidden" name="cerrar">
    </form>
</body>

</html>
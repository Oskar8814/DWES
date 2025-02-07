<?php
include_once 'Bombilla.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['bombillas'])) {
    $_SESSION['bombillas'] = [];
    $_SESSION['bombillas'][] = serialize(new Bombilla(50, "Cocina"));
    $_SESSION['bombillas'][] = serialize(new Bombilla(45, "Baño"));
    $_SESSION['bombillas'][] = serialize(new Bombilla(45, "Salón"));
    // $_SESSION['bombillasGen'] = [];
}

if (isset($_REQUEST['ubicacion']) && isset($_REQUEST['potencia'])) {
    $ubicacion = $_REQUEST['ubicacion'];
    $potencia = intval($_REQUEST['potencia']);

    $nuevaBombilla = new Bombilla($potencia, $ubicacion);

    $_SESSION['bombillas'][] = serialize($nuevaBombilla);
}

//Enciende una bombilla
if (isset($_REQUEST['encender'])) {
    $indice = intval($_REQUEST['indice']);
    $bombilla = unserialize($_SESSION['bombillas'][$indice]);
    $bombilla->encender();
    $_SESSION['bombillas'][$indice] = serialize($bombilla);

    // $_SESSION['bombillasGen'] = $_SESSION['bombillas'];
}

//Apaga una bombilla
if (isset($_REQUEST['apagar'])) {
    $indice = intval($_REQUEST['indice']);
    $bombilla = unserialize($_SESSION['bombillas'][$indice]);
    $bombilla->apagar();
    $_SESSION['bombillas'][$indice] = serialize($bombilla);

    // $_SESSION['bombillasGen'] = $_SESSION['bombillas'];
}

//Se apagan todas las bombillas
if (isset($_REQUEST['apagaGeneral'])) {
    // foreach ($_SESSION['bombillas'] as $key => $bomb) {
    //     $bombilla = unserialize($bomb);
    //     $bombilla->apagar();
    //     $_SESSION['bombillas'][$key] = serialize($bombilla);
    // }
    $_SESSION['interruptorGen'] = false;
    $_SESSION['potenciaGlobal'] = 0; //Resetea el consumo global para evitar negativos
}


if (isset($_REQUEST['enciendeGeneral'])) {
    //Controlar que ninguna este encendida ya que significaria que no se ha ido la luz.
    // $bandera = true;
    // foreach ($_SESSION['bombillas'] as $key => $bom) {
    //     $bombi = unserialize($bom);
    //     if ($bombi->getEstado()) {
    //         $bandera = false;
    //     }
    // }

    //Si se ha ido la luz volver a encender las que antes estaban encendidas.
    // if ($bandera) {
    //     $_SESSION['bombillas'] = $_SESSION['bombillasGen'];
    // foreach ($_SESSION['bombillas'] as $ind => $bombi) {
    //     $bombilla = unserialize($bombi);
    //     if ($bombilla->getEstado()) {
    //         $_SESSION['potenciaGlobal'] += $bombilla->getPotencia();
    //     }
    // }
    // }

    //Volvemos a poner la potencia general en el valor anterior al apagon 
    if (!$_SESSION['interruptorGen'] == true) {
        foreach ($_SESSION['bombillas'] as $ind => $bombi) {
            $bombilla = unserialize($bombi);
            if ($bombilla->getEstado()) {
                $_SESSION['potenciaGlobal'] += $bombilla->getPotencia();
            }
        }
    }
    //Activamos de nuevo las bombillas
    $_SESSION['interruptorGen'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>
    <h2>Generar Bombillas</h2>
    <form action="" method="post">
        <label for="">Ubicación:</label>
        <input type="text" name="ubicacion" id="">
        <label for="">Potencia:</label>
        <input type="number" name="potencia" id="">
        <input type="submit" value="Añadir Bombilla">
    </form>

    <h2>Conjunto de Bombillas</h2>
    <table>
        <tr>
            <th>Ubicación</th>
            <th>Potencia</th>
            <th>Estado</th>
        </tr>

        <?php
        foreach ($_SESSION['bombillas'] as $key => $bombilla) {
        ?>
            <tr>
                <td><?= unserialize($bombilla)->getUbicacion() ?></td>
                <td><?= unserialize($bombilla)->getPotencia() ?></td>
                <td><?= unserialize($bombilla)->estado() ?>

                    <form action="" method="post">
                        <input type="submit" value="Encender">
                        <input type="hidden" name="encender">
                        <input type="hidden" name="indice" value="<?= $key ?>">
                    </form>

                    <form action="" method="post">
                        <input type="submit" value="Apagar">
                        <input type="hidden" name="apagar">
                        <input type="hidden" name="indice" value="<?= $key ?>">
                    </form>
                </td>
            </tr>
        <?php

        }
        ?>
    </table>
    <h2>Consumo Global</h2>
    <?php
    echo "El consumo es " . Bombilla::getPotenciaGlobal();
    ?>

    <h2>Interruptor General</h2>
    <form action="" method="post">
        <input type="submit" value="Apagar General" name="apagaGeneral">
        <input type="submit" value="Encender General" name="enciendeGeneral">
    </form>
</body>

</html>
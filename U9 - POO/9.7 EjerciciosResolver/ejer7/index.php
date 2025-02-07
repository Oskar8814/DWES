<?php
include_once 'DadoPoker.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['dados'])){
    for ($i=0; $i < 5; $i++) { 
        $_SESSION['dados'][]=new DadoPoker();
    }
}
if (isset($_REQUEST['tirar']) && isset($_REQUEST['dado'])) {
    // for ($i=0; $i < 5; $i++) { 
    //     $_SESSION['dados'][$i]->tira();
    // }

    //FORMA LARGA SI NO PONGO EL RQ DIRECTAMENTE EN EL IN_ARRAY SI DESCOMENTAR QUITAR ISS DE ARRIBA Y CONTROLARLO CON ESTE IF
    // if (isset($_REQUEST['dado'])) {
    //     $seleccionados = $_REQUEST['dado'];
    // }else {
    //     $seleccionados=[];
    // }
    // $seleccionados = isset($_REQUEST['dado']) ? $_REQUEST['dado']:[];

    foreach ($_SESSION['dados'] as $key => $dado) {
        if (in_array($key,$_REQUEST['dado'])){
            $dado->tira();
        }   
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,tr,td{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

<!-- modificarlo para que sea interactivo, puedas tirar los dados constantemente y mostrando la tirada en una  -->

<h1>Tiradas de Dados de Poker</h1>

    <h3>Tiradas totales: <?= DadoPoker::getTiradasTotales() ?></h3>
    
    <form action="" method="post">
        <table>
            <tr><th colspan="5">Tirada Actual</th></tr>
            <tr>
            <?php
            for ($i=1; $i < 6; $i++) { 
                echo "<th>Dado $i</th>";
            }
            
            ?>
            </tr>
            <tr>
                <?php
                foreach ($_SESSION['dados'] as $key => $dado) {
                    ?>
                    <td>
                        <?= $dado->nombreFigura() ?>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($_SESSION['dados'] as $indice => $value) {
                    ?>
                    <td>
                        <input type="checkbox" checked name="dado[]" id="" value="<?= $indice ?> ">
                    </td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <br>
        <input type="submit" value="Tirar Dados">
        <input type="hidden" name="tirar">

    </form>
</body>
</html>

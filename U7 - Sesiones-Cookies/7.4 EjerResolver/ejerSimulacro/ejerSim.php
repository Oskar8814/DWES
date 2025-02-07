<?php
session_start();
include('funciones.php');

if (!isset($_SESSION['almacen'])) {
    if (isset($_COOKIE["almacen"])) {
        $_SESSION['almacen'] = unserialize(base64_decode($_COOKIE["almacen"]));
    } else {
        $_SESSION['almacen'] = [];
    }
    setcookie("almacen", base64_encode(serialize($_SESSION['almacen'])), time() + 3600);
}

if (isset($_REQUEST['marca']) && isset($_REQUEST['tipo'])) {
    $matricula = generaMatricula($_REQUEST['marca']);
    $_SESSION['almacen'][$matricula]["fecha"] = $_REQUEST['fecha'];
    $_SESSION['almacen'][$matricula]["marca"] = $_REQUEST['marca'];
    $_SESSION['almacen'][$matricula]["tipo"] = $_REQUEST['tipo'];
    if (isset($_REQUEST['extras'])) {
        $_SESSION['almacen'][$matricula]["extras"] = $_REQUEST['extras'];
    } else {
        $_SESSION['almacen'][$matricula]["extras"] = [];
    }
    setcookie("almacen", base64_encode(serialize($_SESSION['almacen'])), time() + 3600);
}

if (isset($_REQUEST['extra'])) {
    $matricula = $_REQUEST['matricula'];
    $_SESSION['almacen'][$matricula]["extras"][] = $_REQUEST['extra'];
    setcookie("almacen", base64_encode(serialize($_SESSION['almacen'])), time() + 3600);

}

if (isset($_REQUEST['eliminar'])) {
    unset($_SESSION['almacen']);
    setcookie("almacen", "", -1);
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
        td,
        th,
        table {
            border: solid 1px black;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $tipos = ["turismo", "berlina", "monovolumen", "deportivo", "furgoneta"];
    ?>
    <form action="" method="post">
        Marca: <input type="text" name="marca" id="">
        <select name="tipo" id="">
            <?php
            foreach ($tipos as $key => $value) {
                ?>
                <option value="<?= $value?>"><?= $value ?></option>
                <?php
            }
            ?>
        </select>
        Extras:
        Camara Trasera:<input type="checkbox" name="extras[]" id="" value="camara trasera">
        Llantas Aleacion:<input type="checkbox" name="extras[]" id="" value="llanta aleacion">
        Climatizador:<input type="checkbox" name="extras[]" id="" value="climatizador">
        <input type="hidden" name="fecha" value="<?= time() ?>">
        <input type="submit" value="Añadir">
    </form>
    <table>
        <tr>
            <th>Matricula</th>
            <th>Fecha</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Extras</th>
            <th></th>
        </tr>
        <?php
        if (isset($_SESSION['almacen'])) {

            foreach ($_SESSION['almacen'] as $key => $value) {
                echo "<tr>";
                $fecha = parseFecha($value["fecha"]);
                
        ?>
                <td><?= $key ?></td>
                <td><?= $fecha ?></td>
                <td><?= $value["marca"] ?></td>
                <td><?= $value["tipo"] ?></td>
                <td>
                    <?php
                    if ($value["extras"] != null) {
                        foreach ($value["extras"] as $k => $extra) {
                            echo "$extra <br>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="text" name="extra" id="">
                        <input type="submit" value="añadir">
                        <input type="hidden" name="matricula" value="<?= $key ?>">
                    </form>
                </td>
        <?php
                echo "</tr>";
            }
        }
        ?>
    </table>
    <hr>
    <form action="categoria.php">
        <label for="cat">Selecciona una categoria</label>
        <select name="categoria" id="">
            <?php
            foreach ($tipos as $key => $value) {
                ?>
                <option value="<?= $value?>"><?= $value ?></option>
                <?php
            }
            ?>
        </select>
        
        <input type="submit" value="Consultar">
    </form>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="eliminar">
        <input type="submit" value="Borrar todos los coches">
    </form>
</body>

</html>
<?php
session_start();
include('funciones.php');

if (isset($_REQUEST['volver'])) {
    header('location:ejerSim.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,td,th,table{
            border: solid 1px black;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <table>
    <tr>
        <th>Matricula</th>
        <th>Fecha</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Extras</th>
    </tr>
        <?php
        if (isset($_REQUEST['categoria'])) {
            foreach ($_SESSION['almacen'] as $matricula => $value) {
                $fecha = parseFecha($value["fecha"]);
                echo "<tr>";
                if ($value["tipo"] == $_REQUEST['categoria']) {
                    
                    ?>
                    <td><?= $matricula ?></td>
                    <td><?= $fecha ?></td>
                    <td><?= $value["marca"] ?></td>
                    <td><?= $value["tipo"] ?></td>
                    <td>
                <?php
                    if($value["extras"]!=null){
                    foreach ($value["extras"] as $key => $extra) {
                        echo "$extra <br>";
                    }
                }
                ?>
                </td>
                <?php
                }
            }
        }
        ?>
    </table>
    <form action="" method="post">
        <input type="hidden" name="volver">
        <input type="submit" value="Regresar">
    </form>
</body>
</html>
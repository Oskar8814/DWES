<!-- Queremos gestionar la venta de entradas (no numeradas) del Circo del Sol, que tiene 3 zonas, la zona principal 
con 1000 entradas disponibles a un precio de 20€, la zona de compra-venta con 200 entradas disponibles a un 
precio de 35€,  y  la  zona  vip  con  25  entradas  disponibles  a un precio de 50€.  Define  la  clase  Zona  con  sus 
atributos y métodos correspondientes, de manera que permita tener información del ingreso total de ventas de 
todas las entradas (hay que controlar que existen entradas disponibles antes de venderlas), y crea un programa 
que  permita  vender  las  entradas.  En  la  pantalla  principal  debe  aparecer  información  sobre  las  entradas 
disponibles en cada zona, así como su precio y un formulario para vender entradas de la zona seleccionada. 
Debemos indicar para qué zona queremos las entradas y la cantidad de ellas. Lógicamente, el programa debe 
controlar que no se puedan vender más entradas de la cuenta.  -->


<?php
include_once 'Zona.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['circoSol'])) {
    $_SESSION['circoSol']=[
        "Principal" => new Zona("Principal",1000,20),
        "Compra-Venta" => new Zona("Compra-Venta",200,35),
        "VIP" => new Zona("VIP",25,50),
    ];
}

// if (!isset($_SESSION['ingresoTotal'])) {
//     $_SESSION['ingresoTotal'] = Zona::getIngresosTotales();
// }else{
//     Zona::$ingresoTotal = $_SESSION['ingresoTotal'];
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,tr,th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Informacion de las Entradas</h1>
<?php
if (isset($_REQUEST['venta'])) {
    echo "<h3>Información sobre la venta</h3>";
    echo $_SESSION['circoSol'][$_REQUEST['zona']] -> vender($_REQUEST['cantidad']);
    // $_SESSION['ingresoTotal'] = Zona::getIngresosTotales();
}
?>

    <br><br>
    <table>
        <tr>
            <th>Zona</th>
            <th>Entrada Disponible</th>
            <th>Precio</th>
        </tr>
        <?php
            foreach ($_SESSION['circoSol'] as $key => $zona) {
                echo "<tr>";
                ?>
                <td><?= $zona->getNombre() ?></td>
                <td><?= $zona->disponibles() ?></td>
                <td><?= $zona->getPrecioEntrada() ?></td>
                <?php
                echo "</tr>";
            }
        ?>
    </table>

    <br><br>
    <h2>Compra de entradas</h2>

    <form action="#" method="post">
        <select name="zona" id="zona">
            <?php
            foreach ($_SESSION['circoSol'] as $key => $zona) {
                ?>
                <option value="<?= $key ?>"><?= $zona->getNombre() ?></option>
                <?php
            }
            ?>
        </select>
        <label for="cantidad">Cantidad de Entradas:</label>
        <input type="number" name="cantidad" id="">
        <input type="submit" value="Comprar">
        <input type="hidden" name="venta">
    </form>

    <h3>Ingresos Totales</h3>
    <?php
    echo $_SESSION['ingresoTotal'] . "€";
    ?>
</body>
</html>
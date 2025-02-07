<?php
if (session_status() == PHP_SESSION_NONE) session_start();
try {
    $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
    // echo "Se ha establecido una conexión con el servidor de bases de datos.";
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
$consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo");

$articuloPorPagina = 5;
$totalArticulos = $consulta->rowCount();

$cantidad_paginas = ceil($totalArticulos/$articuloPorPagina);

if (!isset($_SESSION['paginaActual'])) {
    $_SESSION['paginaActual']=1;
}

if (isset($_REQUEST['primera'])) {
    $_SESSION['paginaActual']=1;
}
if (isset($_REQUEST['ultima'])) {
    $_SESSION['paginaActual']=$cantidad_paginas;
}
if (isset($_REQUEST['siguiente']) && $_SESSION['paginaActual']<$cantidad_paginas) {
    $_SESSION['paginaActual']+=1;
}
if (isset($_REQUEST['anterior']) && $_SESSION['paginaActual']>1) {
    $_SESSION['paginaActual']-=1;
}

$inicio = ($_SESSION['paginaActual'] - 1) * $articuloPorPagina;

$consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo LIMIT $inicio, $articuloPorPagina");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td,tr,table {
            border: 1px solid black;
            /* border-collapse: collapse; */
            margin: 0 auto;
        }
        h1{
            text-align: center;
        }
        .paginado{
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <h1>GESTISIMAL</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Margen</th>
            <th>Stock</th>
        </tr>
        <?php
        while ($articulo = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $articulo->codigo ?></td>
                <td><?= $articulo->descripcion ?></td>
                <td><?= $articulo->precioCompra ?></td>
                <td><?= $articulo->precioVenta ?></td>
                <td><?= $articulo->precioVenta - $articulo->precioCompra ?></td>
                <td><?= $articulo->stock ?></td>
                <td>
                    <form action="eliminarArticulo.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="modificarArticulo.php" method="post">
                        <input type="submit" value="Modificar">
                        <input type="hidden" name="modificar" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="entradaArticulo.php" method="post">
                        <input type="submit" value="Entrada">
                        <input type="hidden" name="entrada" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="salidaArticulo.php" method="post">
                        <input type="submit" value="Salida">
                        <input type="hidden" name="salida" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table><br>
    <!-- Paginado -->
    <table class="paginado">
        <tr>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="primera">
                    <input type="submit" value="Primera">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="siguiente">
                    <input type="submit" value="Siguiente">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="anterior">
                    <input type="submit" value="Anterior">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="ultima">
                    <input type="submit" value="Última">
                </form>
            </td>
            
        </tr>

    </table><br>
    <!-- Ingreso de nuevo articulo -->
    <table>
        <tr>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
        </tr>
        <tr>
            <form action="altaArticulo.php" method="post">
                <td><input type="text" name="codigo" id=""></td>
                <td><input type="text" name="descripcion" id=""></td>
                <td><input type="number" name="compra" step="0.01" id=""></td>
                <td><input type="number" name="venta" step="0.01" id=""></td>
                <td><input type="number" name="stock" id=""></td>
                <td><input type="submit" value="Nuevo Articulo"></td>
            </form>
        </tr>
    </table>
</body>

</html>
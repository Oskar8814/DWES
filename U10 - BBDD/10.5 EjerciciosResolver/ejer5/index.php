<?php
include('funciones.php');
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$conexion = conexion();
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

//Añadir articulos al carrito
if (isset($_REQUEST['comprar'])) {
    $_SESSION['carrito'][] = $_REQUEST['comprar'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
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
            <th colspan="5">Interacciones</th>
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
                    <form action="eliminarArticulo.php" method="post" >
                        <input type="submit" value="Eliminar" class="eliminar">
                        <input type="hidden" name="eliminar" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="modificarArticulo.php" method="post" >
                        <input type="submit" value="Modificar" class="modificar">
                        <input type="hidden" name="modificar" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="entradaArticulo.php" method="post">
                        <input type="submit" value="Entrada" class="input">
                        <input type="hidden" name="entrada" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="salidaArticulo.php" method="post">
                        <input type="submit" value="Salida" class="input">
                        <input type="hidden" name="salida" value="<?= $articulo->codigo ?>">
                    </form>
                </td>
                <td>
                    <form action="añadirCarrito.php" method="post">
                        <input type="submit" value="comprar" class="comprar">
                        <input type="hidden" name="comprar" value="<?= $articulo->codigo ?>">
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
                <p>Página <?= $_SESSION['paginaActual'] . " de " . $cantidad_paginas ?></p>
            </td>
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
                <td><input type="submit" value="Nuevo Articulo" class="alta"></td>
            </form>
        </tr>
    </table><br>
    <form action="carrito.php" method="post">
        <input type="hidden" name="carrito">
        <input type="submit" value="Mostrar Carrito" class="input carrito">
    </form>
    <p class="text">Total de productos en el carrito <?= count($_SESSION['carrito']) ?></p>
</body>

</html>
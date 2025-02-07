<!-- Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un catálogo de cuatro 
o cinco productos será suficiente. De cada producto se debe conocer al menos la descripción y el precio. Todos 
los productos deben tener una imagen que los identifique. Al  lado de cada producto del catálogo deberá 
aparecer un botón Comprar que permita añadirlo al carrito. Si el usuario hace clic en el botón Comprar de un 
producto que ya estaba en el carrito, se deberá incrementar el número de unidades de dicho producto. Para cada 
producto que aparece en el carrito, habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un 
producto concreto del carrito de la compra. A continuación se muestra una captura de pantalla de una posible 
solución.  -->
<?php
session_start();
$catalogo = [
    "av01" => [
        "nombre" => "Supermarine Spitfire",
        "precio" => 300,
        "imagen" => "img/spitfire.jpg"
    ],
    "av02" => [
        "nombre" => "P-51 Mustang",
        "precio" => 320,
        "imagen" => "img/p51mustang.jpg"
    ],
    "av03" => [
        "nombre" => "Messerschmitt Bf 109",
        "precio" => 290,
        "imagen" => "img/bf109.jpg"
    ]
];

if (isset($_REQUEST['añadir'])) {
    $keyAvion = $_REQUEST['añadir'];
    if (isset($catalogo[$keyAvion])) {
        if (isset($_SESSION['carrito'][$keyAvion])) {
            $_SESSION['carrito'][$keyAvion]++;
        } else {
            $_SESSION['carrito'][$keyAvion] = 1;
        }
    }
}
if (isset($_REQUEST['eliminar'])) {
    $keyEliminar = $_REQUEST['eliminar'];
    if (isset($_SESSION['carrito'][$keyEliminar])) {
        unset($_SESSION['carrito'][$keyEliminar]);
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
        img {
            height: 100px;
            width: 300px;
        }
        .container {
            display: flex;
            justify-content: space-between;
        }
        .catalogo, .carrito {
            width: 48%;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Tienda de Aviones</h1>
    <div class="container">
        <!-- Columna del Catálogo -->
        <div class="catalogo">
            <h2>Catálogo</h2>
            <table>
                <?php foreach ($catalogo as $key => $datosAvion) { ?>
                    <tr>
                        <td>
                            <img src="<?= $datosAvion["imagen"] ?>" alt=""><br>
                            <strong>Nombre:</strong> <?= $datosAvion['nombre'] ?><br>
                            <strong>Precio:</strong> <?= $datosAvion['precio'] ?> €
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="añadir" value="<?= $key ?>">
                                <input type="submit" value="Añadir al carrito">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Columna del Carrito -->
        <div class="carrito">
            <h2>Carrito de la compra</h2>
            <table>
                <?php 
                $preciototal = 0;
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    foreach ($catalogo as $keyCatalogo => $datosAvion) {
                        if (isset($_SESSION['carrito'][$keyCatalogo])) {
                            $cantidad = $_SESSION['carrito'][$keyCatalogo];
                            $precioTotalProducto = $datosAvion['precio'] * $cantidad;
                            $preciototal += $precioTotalProducto;
                ?>
                            <tr>
                                <td>
                                    <img src="<?= $datosAvion["imagen"] ?>" alt=""><br>
                                    <strong>Nombre:</strong> <?= $datosAvion['nombre'] ?><br>
                                    <strong>Precio Unitario:</strong> <?= $datosAvion['precio'] ?> €<br>
                                    <strong>Cantidad:</strong> <?= $cantidad ?><br>
                                    <strong>Subtotal:</strong> <?= $precioTotalProducto ?> €
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="eliminar" value="<?= $keyCatalogo ?>">
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                <?php 
                        }
                    }
                ?>
                    <tr>
                        <td colspan="2"><strong>Precio total: <?= $preciototal ?> €</strong></td>
                    </tr>
                <?php 
                } else { 
                    echo "<tr><td colspan='2'>El carrito está vacío</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>


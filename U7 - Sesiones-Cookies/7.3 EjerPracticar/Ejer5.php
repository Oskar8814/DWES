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
        foreach ($catalogo as $key => $value) {
            if ($keyAvion === $key) {
                if (isset($_SESSION['carrito'][$key])) {
                    $_SESSION['carrito'][$key]++;
                }else{
                    $_SESSION['carrito'][$key] = 1;
                }
            }
        }
    }
    if (isset($_REQUEST['eliminar'])) {
        $keyEliminar = $_REQUEST['eliminar'];
        foreach ($_SESSION['carrito'] as $key => $value) {
            if ($keyEliminar === $key) {
                //$_SESSION['carrito'][$key] = 0;
                unset($_SESSION['carrito'][$key]);
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
        img{
            height: 100px;
            width: 300px;
        }
    </style>
</head>
<body>
    <?php
    
    echo "<h1>Catálogo</h1>";
    foreach ($catalogo as $key => $datosAvion) {
        ?>
    <form action="" method="post">
        <img src="<?= $datosAvion["imagen"] ?>" alt=""><br>
        <h4>Nombre: <?= $datosAvion['nombre'] ?></h4>
        <h4>Precio: <?= $datosAvion['precio'] ?></h4>
        <input type="hidden" name="añadir" value="<?= $key ?>">
        <input type="submit" value="Añadir"><br><br>
    </form>
    <?php
    }

    echo "<h1>Carrito de la compra</h1>";
    if (isset($_SESSION['carrito'])) {
        $preciototal = 0;
        foreach ($catalogo as $keyCatalogo => $datosAvion) {
            foreach ($_SESSION['carrito'] as $keyCesta => $value) {
                if ($keyCatalogo === $keyCesta) {
                    ?>
                    <form action="" method="post">
                        <img src="<?= $datosAvion["imagen"] ?>" alt=""><br>
                        <h4>Nombre: <?= $datosAvion['nombre'] ?></h4>
                        <h4>Precio: <?= $datosAvion['precio'] * $value?></h4>
                        <h4>Cantidad: <?= $value ?></h4>
                        <input type="hidden" name="eliminar" value="<?= $keyCesta ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                    <?php
                    $preciototal += $datosAvion['precio']*$value;
                }
            }
        }
        echo "Precio total: $preciototal €";
    }
    
    ?>
</body>
</html>
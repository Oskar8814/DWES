<!-- Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto.
Para ello, cada uno de los productos del catálogo deberá tener un botón Detalle que, al ser accionado,
debe llevar al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión. 
Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle. -->

<?php
session_start();
$catalogo = [
    "av01" => [
        "nombre" => "Supermarine Spitfire",
        "precio" => 300,
        "imagen" => "img/spitfire.jpg",
        "descripcion" => "El Supermarine Spitfire fue un caza monoplaza británico usado por la Royal Air Force (RAF) y 
        muchos otros países Aliados durante la Segunda Guerra Mundial. <br> El Spitfire fue diseñado por R. J. Mitchell, diseñador jefe de Supermarine Aviation Works 
        (subsidiaria de Vickers-Armstrong desde 1928), como un interceptor de alto rendimiento y corto alcance."
    ],
    "av02" => [
        "nombre" => "P-51 Mustang",
        "precio" => 320,
        "imagen" => "img/p51mustang.jpg",
        "descripcion" => "El North American P-51 Mustang fue un caza y caza de escolta monomotor estadounidense de largo alcance,<br> 
        utilizado por las Fuerzas Aéreas del Ejército de los Estados Unidos (USAAF) durante la Segunda Guerra Mundial y la Guerra de Corea, entre otros conflictos.<br> 
        El Mustang fue diseñado en 1940 por North American Aviation (NAA) en respuesta a un requerimiento de la Comisión de Adquisiciones del Reino Unido"
    ],
    "av03" => [
        "nombre" => "Messerschmitt Bf 109",
        "precio" => 290,
        "imagen" => "img/bf109.jpg",
        "descripcion" => "El Messerschmitt Bf 109 fue un avión de caza alemán de la Segunda Guerra Mundial, <br>
        diseñado por un equipo al mando de Wilhelm Willy Emil Messerschmitt a principios de los años 30, cuando era diseñador jefe de la Bayerische Flugzeugwerke <br>
        (de ahí que su prefijo sea Bf). Fue uno de los primeros cazas realmente modernos de la época, <br>
        incluyendo características tales como una construcción monocasco totalmente metálica, carlinga cerrada y tren de aterrizaje retráctil. "
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
        <form action="descripcion_ejer6.php" method="post">
            <input type="submit" value="Descripción">
            <input type="hidden" name="descripcion" value="<?= $key ?>">
            <input type="hidden" name="catalogo" value="<?= base64_encode(serialize($catalogo)) ?>">
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
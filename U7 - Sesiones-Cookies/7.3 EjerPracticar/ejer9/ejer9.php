<!-- Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para  comprar , se almacenen en 
cookies (solo los productos, no almacenar el contenido de la cesta) . La aplicación debe ofrecer, por tanto, las 
opciones de alta, baja y modificación de productos.  
Cuando no hay productos almacenados en la cookie, se toman los productos por defecto usados en el ejercicio 
6, asignándolos en código y además se almacenan en la cookie, para que estén disponibles para las futuras 
cargas de la página. Por tanto cada vez que se cargue la página principal, se cargará una array en la sesión con 
todos los productos de la tienda recuperados de la cookie, y cada vez que se actualicen los productos en dicho 
array (alta, baja o modificación) también debe actualizarse la cookie para  que dichos cambios estén disponibles 
en la siguiente carga de la página. 
También debemos añadir un botón para inicializar los productos por defectos (los del ejercicio 6)  deshaciendo 
todos los cambios realizados en los productos. Añadir un botón Administrar productos en la página principal, 
que lleve a una segunda página, donde se realizarán todas las operaciones de mantenimiento de los productos -->

<?php
session_start();
// Borrado de todas las cookies
if (isset($_REQUEST['borraCookies'])) {
    setcookie("catalogo", "", time() - 3600);
    unset($catalogo);
    unset($_SESSION['catalogo']);
    header('refresh:0;');
}

if (!isset($_COOKIE['catalogo'])) {
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
    setcookie("catalogo", base64_encode(serialize($catalogo)), time() + 3600);
} else {
    $catalogo = unserialize(base64_decode($_COOKIE['catalogo']));
    $_SESSION['catalogo'] = $catalogo;
}

if (isset($_REQUEST['añadir'])) {
    $keyAvion = $_REQUEST['añadir'];
    foreach ($catalogo as $key => $value) {
        if ($keyAvion === $key) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]++;
            } else {
                $_SESSION['carrito'][$key] = 1;
            }
        }
    }
}
if (isset($_REQUEST['eliminar'])) {
    unset($_SESSION['carrito'][ $_REQUEST['eliminar']]);
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
    </style>
</head>

<body>
    <?php

    echo "<h1>Catálogo</h1>";
    foreach ($catalogo as $key => $datosAvion) {
    ?>
        <form action="" method="post">
            <img src="<?= $datosAvion['imagen'] ?>" alt=""><br>
            <h4>Nombre: <?= $datosAvion['nombre'] ?></h4>
            <h4>Precio: <?= $datosAvion['precio'] ?></h4>
            <input type="hidden" name="añadir" value="<?= $key ?>">
            <input type="submit" value="Añadir"><br><br>
        </form>
        <form action="descripcion_ejer9.php" method="post">
            <input type="submit" value="Descripción">
            <input type="hidden" name="descripcion" value="<?= $key ?>">
            <!-- <input type="hidden" name="catalogo" value="<?= base64_encode(serialize($catalogo)) ?>"> -->
        </form>
    <?php
    }
    ?>
    <h2>Administración del Catálogo</h2>
    <form action="administrarCatalogo.php" method="post">
        <input type="submit" value="Administrar el Catálogo">
    </form>

    <h2 style="color:crimson">Eliminar Cookies</h2>
    <form action="#" method="post">
        <input type="hidden" name="borraCookies" value="si">
        <input type="submit" value="Borrar cookies">
    </form>
    <br>

    <?php
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
                        <h4>Precio: <?= $datosAvion['precio'] * $value ?></h4>
                        <h4>Cantidad: <?= $value ?></h4>
                        <input type="hidden" name="eliminar" value="<?= $keyCesta ?>">
                        <input type="submit" value="Eliminar">
                    </form>
    <?php
                    $preciototal += $datosAvion['precio'] * $value;
                }
            }
        }
        echo "Precio total: $preciototal €";
    }

    ?>
</body>

</html>
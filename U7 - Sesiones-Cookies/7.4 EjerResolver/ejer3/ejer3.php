<!-- Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín. En la  página 
principal tendremos un listado compuesto por una tabla con 4 columnas, nombre del producto, precio, imagen 
y botón para añadir a la cesta, si se añade más de una vez se aumenta la cantidad del producto en la cesta. 
También se mostrará cuantos productos hay en la cesta en todo momento y un enlace para acceder a dicha cesta 
que mostrará otro listado de los productos añadidos y su cantidad, junto a cada producto habrá un botón eliminar 
que permita quitar una unidad de ese producto y si se llega a 0 se e limina el producto de la cesta. Al final de la 
cesta se mostrará el importe total de todos los productos y un botón o enlace para cerrar la cesta y volver a la 
página principal. 
Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra página la imagen 
a  tamaño original (algo más grande) junto con los datos del producto y  el detalle del mismo (una breve 
descripción). 

Crear manualmente en código, un array de sesión con todos los productos la primera vez que se carga la página 
en una sesión nueva (con 3 o 4 productos es suficiente). El array puede ser asociativo con clave ‘nombre del 
producto’ y valor un array con los valores ‘precio, detalle’ y la imagen puede coincidir con el nombre del 
producto más la extensión 
Los productos añadidos en la cesta deben almacenarse en una cookie por si se cierra el navegador y se abre de 
nuevo se recuperen automáticamente los productos añadidos a la cesta -->
<?php
session_start();
if (!isset($_SESSION['catalogo'])) {
    $catalogo = [
        "av1" => [
            "nombre" => "Supermarine Spitfire",
            "precio" => 300,
            "imagen" => "img/spitfire.jpg",
            "descripcion" => "El Supermarine Spitfire fue un caza monoplaza británico usado por la Royal Air Force (RAF) y 
            muchos otros países Aliados durante la Segunda Guerra Mundial. <br> El Spitfire fue diseñado por R. J. Mitchell, diseñador jefe de Supermarine Aviation Works 
            (subsidiaria de Vickers-Armstrong desde 1928), como un interceptor de alto rendimiento y corto alcance."
        ],
        "av2" => [
            "nombre" => "P-51 Mustang",
            "precio" => 320,
            "imagen" => "img/p51mustang.jpg",
            "descripcion" => "El North American P-51 Mustang fue un caza y caza de escolta monomotor estadounidense de largo alcance,<br> 
            utilizado por las Fuerzas Aéreas del Ejército de los Estados Unidos (USAAF) durante la Segunda Guerra Mundial y la Guerra de Corea, entre otros conflictos.<br> 
            El Mustang fue diseñado en 1940 por North American Aviation (NAA) en respuesta a un requerimiento de la Comisión de Adquisiciones del Reino Unido"
        ],
        "av3" => [
            "nombre" => "Messerschmitt Bf 109",
            "precio" => 290,
            "imagen" => "img/bf109.jpg",
            "descripcion" => "El Messerschmitt Bf 109 fue un avión de caza alemán de la Segunda Guerra Mundial, <br>
            diseñado por un equipo al mando de Wilhelm Willy Emil Messerschmitt a principios de los años 30, cuando era diseñador jefe de la Bayerische Flugzeugwerke <br>
            (de ahí que su prefijo sea Bf). Fue uno de los primeros cazas realmente modernos de la época, <br>
            incluyendo características tales como una construcción monocasco totalmente metálica, carlinga cerrada y tren de aterrizaje retráctil. "
        ]
    ];
    $_SESSION['catalogo'] = $catalogo;
    setcookie("catalogo", base64_encode(serialize($catalogo)), time() + 3600);
}

if (isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = $_COOKIE['carrito'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tiendecita de Aviones</title>
    <style>
        tr,td,table{
            border: solid 1px black;
        }
        img{
            height: 100px;
            width: 300px;
        }
    </style>
</head>
<body>
    <table>
        <?php
        $cantidadProd = 0;

        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $key => $value) {
                $cantidadProd += $value;
            }
        }
        
        ?>
        <tr><td colspan="3">La tiendecita</td><td><a href="mostrarCarrito_ejer3.php">Cesta <?= $cantidadProd ?> Prod</a></td></tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td></td>
        </tr>
        <?php
        foreach ($_SESSION['catalogo'] as $key => $avion) {
            ?>
            <tr>
                <td><?= $avion['nombre'] ?></td>
                <td><?= $avion['precio'] ?></td>
                <td><a href="descripcion_ejer3.php?descripcion=<?= $key ?>"><img src="<?= $avion['imagen'] ?>" alt="Avion"></a></td>
                <form action="añadirCarrito_ejer3.php" method="post">
                    <td><input type="submit" value="Añadir"></td>
                    <input type="hidden" name="añadir" value="<?= $key ?>">
                </form>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <form action="administrarProductos_ejer3.php" method="post">
        <input type="submit" value="Administrar Productos">
    </form>
</body>
</html>
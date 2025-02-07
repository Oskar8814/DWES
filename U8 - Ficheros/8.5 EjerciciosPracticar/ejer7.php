<!-- Crea código php donde a través de la función escribirNumerosMod escribas en el fichero los números 2, 8, 14. Luego, 
mediante la función leerContenidoFichero muestra el contenido del fichero. Ahora con la función 
escribirNumerosMod amplía el contenido del fichero y añádele los números 33, 11 y 16. Muestra nuevamente el 
contenido del fichero  por pantalla. Finalmente, escribe el fichero  pasándole un array con los número 4, 99, 12 y 
parámetro <<sobreescribir>> para eliminar los datos que existieran previamente. Muestra el contenido del fichero 
por pantalla y un mensaje de despedida. -->

<?php
include('funciones.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    escribirNumerosMod([2,8,14],"sobreescribir");
    leerContenidoFichero("datosEjercicio.txt");
    escribirNumerosMod([33,11,16],"ampliar");
    leerContenidoFichero("datosEjercicio.txt");
    escribirNumerosMod([4,99,12],"sobreescribir");
    leerContenidoFichero("datosEjercicio.txt");
    echo "Hasta luego!!";
    ?>
</body>
</html>
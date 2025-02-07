<!-- Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente traducción al castellano. 
Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta <table> de HTML. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ingles1 = "Apple ";
    $ingles2 = "Book";
    $ingles3 = "House";
    $ingles4 = "Water";
    $ingles5 = "Sun";
    $ingles6 = "Friend";
    $ingles7 = "Car";
    $ingles8 = "Food";
    $ingles9 = "Dog";
    $ingles10 = "Music";
    $esp1= "Manzana";
    $esp2= "Libro";
    $esp3= "Casa";
    $esp4= "Agua";
    $esp5= "Sol";
    $esp6= "Amigo";
    $esp7= "Coche";
    $esp8= "Comida";
    $esp9= "Perro";
    $esp10= "Musica";
    ?>
    <table>
        <tr>
            <th>Ingles</th>
            <th>Español</th>
        </tr>
        <tr>
            <td><?= $ingles1?></td>
            <td><?= $esp1 ?></td>
        </tr>
        <tr>
            <td><?= $ingles2 ?></td>
            <td><?= $esp2 ?></td>
        </tr>
        <tr>
            <td><?= $ingles3 ?></td>
            <td><?= $esp3 ?></td>
        </tr>
        <tr>
            <td><?= $ingles4 ?></td>
            <td><?= $esp4 ?></td>
        </tr>
        <tr>
            <td><?= $ingles5 ?></td>
            <td><?= $esp5 ?></td>
        </tr>
        <tr>
            <td><?= $ingles6 ?></td>
            <td><?= $esp6 ?></td>
        </tr>
        <tr>
            <td><?= $ingles7 ?></td>
            <td><?= $esp7 ?></td>
        </tr>
        <tr>
            <td><?= $ingles8 ?></td>
            <td><?= $esp8 ?></td>
        </tr>
        <tr>
            <td><?= $ingles9 ?></td>
            <td><?= $esp9 ?></td>
        </tr>
        <tr>
            <td><?= $ingles10 ?></td>
            <td><?= $esp10 ?></td>
        </tr>
    </table>
</body>
</html>
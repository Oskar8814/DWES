<!-- Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la combinación de 6
números entre 1 y 49 y el número de serie entre 1 y 999. Mostrar la combinación generada y la introducida por
el usuario en dos filas de una tabla. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            table {
        border: 1px solid #000;
        }
        th, td {
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        }
    </style>
</head>
<body>
    <?php
        $n1 = $_REQUEST['n1'];
        $n2 = $_REQUEST['n2'];
        $n3 = $_REQUEST['n3'];
        $n4 = $_REQUEST['n4'];
        $n5 = $_REQUEST['n5'];
        $n6 = $_REQUEST['n6'];
        $serie = $_REQUEST['serie'];
        $random1 = rand(1,49);
        $random2 = rand(1,49);
        $random3 = rand(1,49);
        $random4 = rand(1,49);
        $random5 = rand(1,49);
        $random6 = rand(1,49);
        $randomS = rand(1,999);
    ?>
    <table>
        <tr>
            <th></th>
            <th>Número 1</th>
            <th>Número 2</th>
            <th>Número 3</th>
            <th>Número 4</th>
            <th>Número 5</th>
            <th>Número 6</th>
            <th>Serie</th>
        </tr>
        <tr>
            <td>Resultados</td>
            <td><?= $random1 ?></td>
            <td><?= $random2 ?></td>
            <td><?= $random3 ?></td>
            <td><?= $random4 ?></td>
            <td><?= $random5 ?></td>
            <td><?= $random6 ?></td>
            <td><?= $serie ?></td>
        </tr>
        <tr>
            <td>Apuesta</td>
            <td><?= $n1 ?></td>
            <td><?= $n2 ?></td>
            <td><?= $n3 ?></td>
            <td><?= $n4 ?></td>
            <td><?= $n5 ?></td>
            <td><?= $n6 ?></td>
            <td><?= $randomS ?></td>
        </tr>
    </table>
</body>
</html>
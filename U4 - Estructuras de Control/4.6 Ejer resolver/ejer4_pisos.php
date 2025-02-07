<!-- Diseñar una página web que muestre una tabla con 3 columnas, la primera corresponde al número de 
bloque, la segunda al piso y en la tercera hay un botón llamar. En total hay 10 bloques y cada bloque 
tiene 7 pisos. Cuando se pulse llamar en un piso de un bloque, mostrará en otra página el mensaje del 
tipo “Usted ha llamado al piso 3 del bloque 6”. Utiliza estructuras repetitivas para generar la tabla.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:0px;
        }
        td, tr, th{
            border:1px solid black;
        }

    </style>
</head>
<body>
    <table>
    <tr><th>Bloque</th><th>Piso</th><th>Llamar</th></tr>
    <?php
        for ($i=1; $i <= 10; $i++) { 
            for ($j=1; $j <= 7 ; $j++) { 
                ?>
                <tr>
                    <td>
                        Bloque <?= $i ?>
                    </td>
                    <td>
                        Piso <?= $j ?>
                    </td>
                    <td><a href="ejer4_llamadaPiso.php?bloque=<?= $i ?>&piso=<?= $j ?>">Llamar</a></td>
                </tr>
                <?php
            }
        }
    ?>
    </table>
</body>
</html>
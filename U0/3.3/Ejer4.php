<!-- Escribe un programa que muestre tu horario de clase mediante una tabla. 
Aunque se puede hacer íntegramente en HTML (igual que los ejercicios anteriores), 
ve intercalando código HTML y PHP para familiarizarte con éste último. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario 2º DAW</title>
</head>
<body>
    <?php
    $despliegue = "Despliegue";
    $diseño = "Diseño de Aplicaciones";
    $servidor = "Entorno Servidor";
    $cliente = "Entorno Cliente";
    $hlc = "HLC";
    $empresa ="Empresa";
    ?>
    <table>
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <tr>
            <td><?= $empresa ?></td>
            <td><?= $despliegue ?></td>
            <td><?= $cliente ?></td>
            <td><?= $diseño ?></td>
            <td><?= $servidor ?></td>
        </tr>
        <tr>
            <td><?= $empresa ?></td>
            <td><?= $despliegue ?></td>
            <td><?= $cliente ?></td>
            <td><?= $diseño ?></td>
            <td><?= $hlc ?></td>
        </tr>
        <tr>
            <td><?= $empresa ?></td>
            <td><?= $despliegue ?></td>
            <td><?= $cliente ?></td>
            <td><?= $diseño ?></td>
            <td><?= $hlc ?></td>
        </tr>
        <tr>
            <td><?= $empresa ?></td>
            <td><?= $diseño ?></td>
            <td><?= $servidor ?></td>
            <td><?= $servidor ?></td>
            <td><?= $cliente ?></td>
        </tr>
        <tr>
            <td><?= $servidor ?></td>
            <td><?= $diseño ?></td>
            <td><?= $servidor ?></td>
            <td><?= $servidor ?></td>
            <td><?= $cliente ?></td>
        </tr>
        <tr>
            <td><?= $servidor ?></td>
            <td><?= $diseño  ?></td>
            <td><?= $servidor ?></td>
            <td><?= $servidor ?></td>
            <td><?= $cliente ?></td>
        </tr>
    </table>
</body>
</html>
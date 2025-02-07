<!-- EJERCICIO Nº 1
Diseñar un formulario web que pida la altura y el diámetro de un cilindro. Una vez el usuario introduzca los
datos y pulse el botón calcular, deberá calcularse el volumen del cilindro y mostrarse el resultado en el
navegador. Mostrar la imagen de un cilindro junto al resultado y un título "Calculo del volúmen de un cilindro",
intenta dar un aspecto agradable a la página de resultado.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $altura = $_REQUEST['altura'];
        $diametro = $_REQUEST['diametro'];
        $radio = $diametro/2;
        //define("PI" , 3.141592);
        $volumen = M_PI * ($radio*$radio)* $altura;

    ?>
    <h1>Calculo del volúmen de un cilindro</h1>
    <img src="img/formula-del-volumen-de-un-cilindro.jpg" alt="Imagen de un cilindro" width= 20%>
    <h2>Resultado: <?= $volumen ?> cm3</h2>
    <p>Radio: <?= $radio ?></p>
    <p>Altura: <?= $altura ?></p>
</body>
</html>
<!-- Crear una página web para generar de manera aleatoria una combinación de apuesta en la lotería primitiva. Se 
pedirán 6 números (entre 1 y 49) y el número de serie (entre 1 y 999). El usuario podrá rellenar los números 
pedidos  que  desee,  dejando  en  blanco  el  resto,  de  modo  que  la  combinación  generada  respete  los  números 
elegidos  y  genere  aleatoriamente  el  resto  hasta  completar  la  combinación  (el  número  de  serie  también  es 
opcional).  El  usuario  también  podrá  rellenar  de  manera  opcional  una  caja  de  texto  como  título  para  su 
combinación. 
Usar una función combinacion() que sea llamada para generar la combinación en función de los parámetros 
recibidos y devuelva el array generado. 
Usar una función imprimeApuesta() que reciba un array y un texto, e imprima en una tabla html con el formato 
que quieras, el array generado con el texto de cabecera, para mostrar el resultado de la combinación generada. 
Si la función no recibe ningún texto como cabecera imprimirá "Combinación generada para la Primitiva".  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotería</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Tipo de fuente */
            background-color: #f4f4f4; /* Color de fondo */
            margin: 0;
            padding: 20px; /* Espaciado interior */
        }   
        input{
            margin: 5px 0;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 25%;
        }
        td {
            border: 1px solid grey;
            padding: 10px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <?php

        function combinacion($numeros, $serie){
            $combinacion = $numeros;
            for ($i=0; $i < count($combinacion); $i++) { 
                if ($combinacion[$i] === "") {
                    $aleatorio =(String) rand(1,49);
                    $combinacion[$i] = $aleatorio;
                }
            }

            if ($serie==="") {
                $serieAleat = rand(1,999);
                $combinacion[] =(String) $serieAleat;
            }else{
                $combinacion[] = $serie;
            }

            return $combinacion;
        }

        function imprimeApuesta($apuesta,$texto){
            if ($texto === "") {
                $texto = "Combinación generada para la Primitiva";
            }
            ?>
            <table>
                <tr><td colspan="6"><?= $texto ?></td></tr>
                <tr>
                    <td><?= $apuesta[0] ?></td>
                    <td><?= $apuesta[1] ?></td>
                    <td><?= $apuesta[2] ?></td>
                    <td><?= $apuesta[3] ?></td>
                    <td><?= $apuesta[4] ?></td>
                    <td><?= $apuesta[5] ?></td>
                </tr>
                <tr>
                    <td colspan="6"><?= $apuesta[6] ?></td>
                </tr>
            </table>
            <?php
        }
    ?>
        <h2>Introduce los datos de la loteria</h2>
    <form action="" method="post">
        Titulo: <input type="text" name="texto" id=""><br>
        Números: <input type="number" name="numeros[]" id="" min="1" max="49">
        <input type="number" name="numeros[]" id="" min="1" max="49">
        <input type="number" name="numeros[]" id="" min="1" max="49">
        <input type="number" name="numeros[]" id="" min="1" max="49">
        <input type="number" name="numeros[]" id="" min="1" max="49">
        <input type="number" name="numeros[]" id="" min="1" max="49"><br>
        Serie: <input type="number" name="serie" id="" min="1" max="999"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (!isset($_REQUEST['texto'])) {
            $numeros = [];
            $serie = 0;
            $texto = "";
        }else {
            $numeros = $_REQUEST['numeros'];
            //var_dump($numeros);
            $serie = $_REQUEST['serie'];
            $texto = $_REQUEST['texto'];
            $apuesta = combinacion($numeros,$serie);
            //var_dump($apuesta);
            imprimeApuesta($apuesta,$texto);
        }

    ?>

</body>
</html>
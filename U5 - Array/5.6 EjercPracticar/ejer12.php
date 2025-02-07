<!-- Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio anterior. 
El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras y comprobará si son correctas. 
Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $diccionario = ['hola'=>'hello','mundo'=>'world','casa'=>'house','perro'=>'dog','gato'=>'cat', 'libro'=>'book','amor'=>'love', 'comida'=>'food', 'escuela'=>'school','familia'=>'family'];
        $palabras = array_rand($diccionario,5);
        // var_dump($palabras);
    ?>
        <h2>Traduce las siguientes palabras: </h2>
        <form action="#" method="post">
            <?php
                for ($i=0; $i < 5; $i++) { 
                    echo "$palabras[$i] la traducción es: ";
                    ?>
                    <input type="text" name="traduccion<?= $i?>"><br>
                    <input type="hidden" name="español<?= $i?>" value="<?= $palabras[$i] ?>">
                    <?php
                }  
            ?>
            <br>
            <input type="submit" value="Enviar">
        </form>
        
    <?php

        //recogemos en un array las respuestas en ingles.
        $ingles = [];
        $español =[];
        for ($i=0; $i < 5; $i++) { 
            if (isset($_REQUEST['traduccion'.$i])) {
                $ingles[$i] = $_REQUEST['traduccion'.$i];
            }else{
                $ingles[$i]= " ";
            }

            if (isset($_REQUEST['español'.$i])) {
                $español[$i] = $_REQUEST['español'.$i];
            }else{
                $español[$i]= " ";
            }
        }
        // var_dump($ingles);
        // var_dump($español);
        //Array Asociativo con las respuestas en ingles y palabra en español
        $respuesta = [];
        for ($i=0; $i < 5; $i++) { 
            $respuesta[$español[$i]] = $ingles[$i];
        }
        // var_dump($respuesta);

        echo "<h2>Respuestas</h2>";
        foreach ($respuesta as $español => $ingles) {
            echo "$español -- $ingles <br>";
        }

        $error = 0;
        $acierto = 0;

        //Comprobar errores y aciertos 
        foreach ($diccionario as $key => $valor){
            if(isset($respuesta[$key])){
                if ($respuesta[$key]!== $valor){
                    ++$error;
                }else{
                    ++$acierto;
                }

            }
        }
        echo "<h2>Cantidad de aciertos y errores.</h2>";
        echo "Aciertos : $acierto <br>";
        echo "Errores : $error";

    ?>
</body>
</html>

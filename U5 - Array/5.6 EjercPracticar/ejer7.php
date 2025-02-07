<!-- Escribe  un programa que genere  20 números enteros aleatorios entre 0 y 100 y que  los almacene  en un 
array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del array 
(del  0  en  adelante)  y  todos  los  números  impares  a  las  celdas  restantes.  Utiliza  arrays  auxiliares  si  es 
necesario. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            display: inline;
        }
    </style>
</head>
<body>
    <?php
        //Generar un array con 20 numeros al azar
        $numeros = [];
        for ($i=0; $i < 20; $i++) { 
            $numeros[$i] = rand(0,100);
        }

        $pares = [];
        $contPares = 0;
        $impares = [];
        $contImpares = 0;

        //Dividir los numeros en dos arrays uno con los pares y otro con los impares.
        foreach ($numeros as $numero){
            if ($numero % 2 == 0) {
                $pares [$contPares] = $numero;
                ++$contPares;
            }else{
                $impares [$contImpares] = $numero;
                ++$contImpares;
            }
        }
        // var_dump($pares);
        // var_dump($impares);
        $ordenados = [];
        
        //Introducir en el array final los numeros pares en las primeras posiciones
        for ($i=0; $i < count($pares) ; $i++) { 
            $ordenados[$i] = $pares[$i];
        }

        //Introducir en el array final los numeros impares tras la posicion de los numeros pares.
        $index = count($ordenados);
        foreach ($impares as $impar) {
            ++$index;
            $ordenados[$index] = $impar;
        }
        // var_dump($ordenados);

        //Mostrar el array.
        foreach ($ordenados as $indice => $numero) {
            echo "<p>$numero -- </p>";
        }
    ?>
</body>
</html>
<!-- Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los elementos 
de  ese  array,  es  decir,  el  elemento  de  la posición  0 debe  pasar  a  la posición  1,  el  de  la 1  a  la  2,  etc.  El 
número que se encuentra en la última posición debe pasar a la posición 0. Finalmente, muestra el contenido 
del array. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php   
        if (!isset($_REQUEST['numeros'])) {
            $numeros =[];
        }else{
            $numeros = $_REQUEST['numeros'];
            echo"<h2>Array de números sin rotar</h2>";
            foreach ($numeros as $value) {
                echo  " $value ,";
            }

            $aux = $numeros[15] ;
            for ($i=count($numeros)-1; $i>0 ; $i--) { 
                $numeros[$i] = $numeros[$i-1]; 
            }
            $numeros[0] = $aux;

            echo"<h2>Array de números rotados</h2>";
            foreach ($numeros as $value) {
                echo  " $value ,";
            }
        }   
    ?>
</body>
</html>
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
    <form action="ejer3_recibe.php" method="post">
        Rellena los 15 números a enviar. <br>
        <?php
        for ($i=0; $i <=15; $i++) { 
            echo "Número $i: <input type='number' name='numeros[]'><br>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
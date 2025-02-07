<!-- Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. El primer término de la serie
de Fibonacci es 0, el segundo es 1 y el resto se calcula sumando los dos anteriores, por lo que tendríamos que los
términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144… El número n se debe introducir por teclado. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_REQUEST['num'])){
            ?>
            <h1>Introduce un número</h1>
            <form action="" method="post">
                <input type="number" name="num">
                <input type="submit" value="Enviar">
            </form>
            <?php
        }else{
            $a = $_REQUEST['num'];
            do {
                
                $a++;
            } while ($a >= 0);
        }
    ?>
</body>
</html>
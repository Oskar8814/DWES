<!-- Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!isset($_REQUEST['num'])) {
    ?>
        <h2>Introduce un número</h2>
        <form action="index9.php" method="post">
            <input type="number" name="num" required>
            <input type="submit" value="Enviar">
        </form>
    <?php
        }else{
            $num = $_REQUEST['num'];
            $contador = -1;
            $num1 = $_REQUEST['num'];

            do {
                $num1 = (int) $num1/10;
                $contador++;
            } while ($num1 != 0);

            echo "El numero $num tiene $contador digitos."; 
        }
    ?>
</body>
</html>
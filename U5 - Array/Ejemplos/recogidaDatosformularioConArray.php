<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="recibeArrayForm.php" method="post"> 
        Introduzca un número: <br>
        Numero 1: <input type="number" name="numeros[]"><br>
        Numero 2: <input type="number" name="numeros[]"><br>
        Numero 3: <input type="number" name="numeros[]"><br>
        Numero 4: <input type="number" name="numeros[]"><br>
        Numero 5: <input type="number" name="numeros[]"><br>
        Numero 6: <input type="number" name="numeros[]"><br>
                <input type="submit" value="OK"> 
    </form>  -->
    <?php
    ?>
    <form action="recibeArrayForm.php" method="post">
    <?php
    for ($i=1; $i <= 20 ; $i++) { 
        echo "Numero $i: <input type='number' name= 'numeros[]'> <br>";
    }
    ?>
    <input type="submit" value="OK">
    </form>
</body>
</html>
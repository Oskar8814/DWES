<!-- Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los pares 
de un color y los impares de otro. -->
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
    <h2>Números pares o impares</h2>
    <?php
        
        if (isset($_REQUEST['n'])) { 
            $contador = $_REQUEST['contadorNumeros']; 
            $cadena = $_REQUEST['cadena'] . " ". $_REQUEST['n']; 
        } else { 
            $contador = 0; 
            $cadena = ""; 
        }

        if ($contador<8) {
            ?>
            <form action="#" method="post"> 
                <label for="numero"> Introduzca el número <?= $contador +1 ?>: </label>
                <input type="number" name="n" autofocus> 
                <input type="hidden" name="contadorNumeros" value="<?= ++$contador ?>"> 
                <input type="hidden" name="cadena" value="<?= $cadena ?>"> 
                <input type="submit" value="OK"> 
            </form>
            
            <?php
        }else{
            $cadena = substr($cadena, 1); // quita el primer espacio 
            $numeros =  explode(" ",$cadena); //Array conn los numeros del formulario

            foreach ($numeros as $numero) {
                if ((int)$numero % 2 == 0) {
                    echo "<p style='color: red;'>$numero, </p>";
                }else {
                    echo "<p style='color: green;'>$numero, </p>";
                }
            }
        }
    ?>
</body>
</html>
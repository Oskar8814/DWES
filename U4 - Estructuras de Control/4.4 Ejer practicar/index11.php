<!-- Escribe  un programa  que muestre  en tres  columnas, el cuadrado y el cubo de los 5 primeros números enteros a 
partir de uno que se introduce por teclado. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        if (!isset($_REQUEST['num'])) {
    ?>
        <h1>Introduce un número</h1>
        <form action="index11.php" method="post">
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>    
    <?php
        }else{
    ?>
        <h1 style="text-align: center;">Tabla del cuadrado y cubo de <?= $_REQUEST['num'] ?> </h1>    
        <table>
            <tr>
                <th>Número</th>
                <th>Cuadrado</th>
                <th>Cubo</th>
            </tr>
            <?php
            $num = $_REQUEST['num'];
            
            for($i = 0; $i < 6; $i++){
                echo "<tr>";
                for ($j=0; $j < 4 ; $j++) { 
                    if ($j == 0) {
                        $a = $num++;
                        echo "<td>$a</td>";
                    }else if($j==1){
                        $b = $a*$a;
                        echo "<td>$b</td>";
                    }else if($j==2){
                        $c = $a*$a*$a;
                        echo "<td>$c</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
    <?php
        }
    ?>
</body>
</html>
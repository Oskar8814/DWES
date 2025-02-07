<!-- Muestra la tabla de multiplicar de un número introducido por teclado. El resultado se debe mostrar en una tabla  -->
<!-- (<table> en HTML). -->
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
            <h2 >Introduce el número a multiplicar</h2>
            <form action="index8.php" method="post">
                <input type="number" name="num" min="1" max="10">
                <input type="submit" value="Enviar">
            </form>
        <?php
        }else{
        ?>
            <h1 style="text-align: center;">Tabla de multiplicar del <?= $_REQUEST['num'] ?></h1>
            <table>
        <?php
            $num = $_REQUEST['num'];
            for ($i = 0; $i < 11; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 4; $j++) {
                    if($j == 0){
                        echo "<td>$num</td>";
                    }elseif ($j == 1) {
                        echo "<td> x </td>";
                    }elseif ($j == 3){
                        $mult = $num*$i;
                        echo "<td> $mult </td>";
                    }elseif($j == 2){
                        echo "<td>$i</td>";
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
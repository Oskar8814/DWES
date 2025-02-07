<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:0px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        img{
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <table>
        <?php
            $aux = 0;
            for ($i=0; $i < 10; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 10 ; $j++) { 
                    $aux++;  
                    ?>
                    <td><a href="ejer5_muestra.php?num=<?=$aux?>"><img src="img/cerrado.JPG" alt=""></a></td>
                    <?php
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
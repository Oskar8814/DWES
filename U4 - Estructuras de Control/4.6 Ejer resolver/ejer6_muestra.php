<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $contador = $_REQUEST['contador'];
        ++$contador
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta meta http-equiv="refresh" content="2; URL=ejer6.php?contador=<?=$contador?>">
    <title>Document</title>
    <style>
        table{
            border-spacing:0px;
        }
        td{
            border:1px solid red;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        img{
            width: 332px;
            height: 500px;
        }
    </style>
</head>
<body>
    
    <?php
        $num = isset($_REQUEST['num6'])? $_REQUEST['num6']:null;
    ?>
    <table>
    <?php 
        $aux = 0;
        for ($i=0; $i < 3; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 3; $j++) { 
                $aux++;
                ?>
                <td><img src="<?php echo ($num == $aux) ? "img/$aux.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
                <?php  
                
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>
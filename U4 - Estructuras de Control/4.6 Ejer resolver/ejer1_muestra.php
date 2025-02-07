<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $contador = $_REQUEST['contador'];
        ++$contador
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta meta http-equiv="refresh" content="2; URL=ejer1.php?contador=<?=$contador?>">
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
        //$num = $_REQUEST['num'];
        $num = isset($_REQUEST['num']) ? $_REQUEST['num'] : null;
    ?>
    
    <table>
        <tr>
            <td><img src="<?php echo ($num==1)? "img/1.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==2)? "img/2.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==3)? "img/3.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
        </tr>
        <tr>
            <td><img src="<?php echo ($num==4)? "img/4.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==5)? "img/5.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==6)? "img/6.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
        </tr>
        <tr>
            <td><img src="<?php echo ($num==7)? "img/7.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==8)? "img/8.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
            <td><img src="<?php echo ($num==9)? "img/9.jpg" : "img/gray-textured-wall.jpg" ?>" alt=""></td>
        </tr>
    </table>  

</body>
</html>
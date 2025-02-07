<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // var_dump($_REQUEST['array']);
        $numero = explode("-",$_REQUEST['array']);
        echo "<br>";
        // var_dump($numero);
        echo "<br>";
        foreach($numero as $elemento){
            echo " $elemento <br> ";
        }
    ?>
</body>
</html>
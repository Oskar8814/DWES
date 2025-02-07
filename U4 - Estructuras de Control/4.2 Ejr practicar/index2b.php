<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_REQUEST['hora'])){
        $hora = $_REQUEST['hora'];
        switch (true){
            case $hora>=6 && $hora<=12:
                echo "<h1>Buenos dias!!</h1>";
                break;
            case $hora>=13 && $hora<20:
                echo "<h1>Buenos tardes!!</h1>";
                break;
            case ($hora>=21 && $hora<=23) || ($hora<=5 && $hora>=0):
                echo "<h1>Buenas noches!!</h1>";
                break;
            default:
                echo"<h1>No es una hora válida!</h1>";
        }
    }else{
    ?>  
        <h1>Ingresa una hora del dia</h1>
        <form action="" method="post">
        <input type="number" name="hora" min="0" max="23">
        <input type="submit" value="Enviar">
    </form>
    <?php
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_REQUEST['pin'])){
        $intentos=3;
    ?>
    <h1>Introduce el pin de desbloqueo (<?= $intentos ?> intentos)</h1>
    <?php
    }else{
        $pin = $_REQUEST['pin'];
        $intentos = $_REQUEST['intentos'];
        
        if ($pin ==333) {
            $intentos=0;
    ?>
            <h1>Has desbloqueado el movil</h1>
            <!-- <img src="" alt=""> -->
    <?php
        }else{
            $intentos--;
            if ($intentos == 0) {
            echo "<h1>Has agotado los intentos</h1>";
            }else{
    ?>
            <h1>PIN equivocado, te quedan <?= $intentos ?> para desbloqueo</h1>
    <?php
            }
        }
    }
    ?>
    <?php
        if ($intentos>0) {
    ?>
            <form action="pin.php" method="post">
                <input type="number" name="pin" required>
                <input type="hidden" name="intentos" value="<?= $intentos ?>">
                <input type="submit" value="Aceptar">
            </form>
    <?php
        }
    ?>
</body>
</html>
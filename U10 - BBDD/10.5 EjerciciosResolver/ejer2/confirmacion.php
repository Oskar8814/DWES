<?php
if (!isset($_REQUEST['eliminar'])) {
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/confirmacion.css">
</head>
<body>
    <h3>¿Desea eliminar al cliente con DNI <?= $_REQUEST['eliminar'] ?>?</h3>
    <form action="eliminarCliente.php" method="post">
        <input type="submit" value="Si">
        <input type="hidden" name="eliminar" value="<?= $_REQUEST['eliminar']?>">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="No">
    </form>
</body>
</html>
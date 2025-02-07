<?php
include_once 'libreria.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['usuario'])) {
    $_SESSION['usuario'] = $_REQUEST['usuario'];
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inicie Sesion</h1>
    <?php
    $usuarios = usuariosFichero("emails.txt");
    ?>
    <form action="" method="post">
        <select name="usuario" id="">
        <?php
        foreach ($usuarios as $key => $usuario) {
            ?>
            <option value="<?= $usuario ?>"><?= $usuario ?></option>
            <?php
        }
        ?>
        </select>
        <input type="submit" value="Elegir Usuario">
    </form>
    <h1>Registrar Nuevo Usuario</h1>
    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="">
        <input type="submit" value="Registrar">
    </form>

</body>
</html>
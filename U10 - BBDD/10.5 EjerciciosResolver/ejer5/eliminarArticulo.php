<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    include('funciones.php');
    if (isset($_REQUEST['eliminar'])) {
    $conexion = conexion();
    $consulta = $conexion->query("SELECT codigo FROM articulo WHERE codigo='$_REQUEST[eliminar]'");

    if ($consulta->rowCount()==0) {
        ?>
        No existe un articulo con el codigo <?= $_REQUEST['eliminar'] ?>
        Por favor intentelo de nuevo <a href="index.php">Inicio</a>
        <?php
    }else {
        $delete = "DELETE FROM articulo WHERE codigo='$_REQUEST[eliminar]'";
        $conexion->exec($delete);
        echo "Articulo dado de baja correctamente.";
        //Si se encuentra en el carrito eliminarlo tambien
        foreach ($_SESSION['carrito'] as $key => $code) {
            if ($code == $_REQUEST['eliminar']) {
                unset($_SESSION['carrito'][$key]);
            }
        }
        $conexion = null;
        header("refresh:2;url=index.php"); // nos redirije en 2 seg al index
    }


} else {
    header('Location:index.php');
}
?>
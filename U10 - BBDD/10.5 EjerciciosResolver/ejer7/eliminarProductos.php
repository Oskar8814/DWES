<?php
include_once('funciones.php');
if (session_status() == PHP_SESSION_NONE) session_start();
if(isset($_REQUEST['eliminar'])){
    $conexion = conexion();
    $consulta = $conexion->query("SELECT nombre,imagen FROM productos WHERE id='$_REQUEST[eliminar]'");
    $avion = $consulta->fetchObject();
    if ($consulta->rowCount()==0) {
        ?>
        No existe un avion con el nombre <?= $avion->nombre ?>
        Por favor intentelo de nuevo <a href="index.php">Inicio</a>
        <?php
    }else {
        //Eliminar la imagen del servidor
        $rutaActual = $avion->imagen;
        if (file_exists($rutaActual)) {
            unlink($rutaActual);
        }

        $delete = "DELETE FROM productos WHERE id='$_REQUEST[eliminar]'";
        $conexion->exec($delete);
        echo "Articulo dado de baja correctamente.";
        

        //Si se encuentra en el carrito eliminarlo tambien
        $keyEliminar = $_REQUEST['eliminar'];
        unset($_SESSION['carrito'][$keyEliminar]);      //Elimina el producto del carrito 
        setcookie("carrito[$keyEliminar]", "", time() - 3600); //Eliminamos el producto de la cookie carrito
        
        $conexion = null;
        header("refresh:2;url=index.php"); // nos redirije en 2 seg al index
    }
}else{
    header('Location:index.php');
}
?>
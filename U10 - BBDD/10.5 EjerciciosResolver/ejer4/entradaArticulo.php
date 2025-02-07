<?php
    if (!isset($_REQUEST['entrada'])) {
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

    <h1>Añadir Stock al articulo <?= $_REQUEST['entrada'] ?></h1>
    <form action="" method="post">
        <label for="">Cantidad que se va a añadir:</label>
        <input type="number" name="cantidad" id="">
        <input type="submit" value="Añadir">
        <input type="hidden" name="entrada" value="<?= $_REQUEST['entrada'] ?>">
    </form>
    

    <?php
        if (isset($_REQUEST['cantidad'])) {
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }
    
            $consulta = $conexion->query("SELECT codigo, stock FROM articulo WHERE codigo='$_REQUEST[entrada]'");
            $articulo = $consulta -> fetchObject();
            $nuevoStock = $articulo->stock + $_REQUEST['cantidad'];
    
            $update= "UPDATE articulo SET stock=\"$nuevoStock\" WHERE codigo=\"$_REQUEST[entrada]\"";
            $conexion->exec($update);
            echo "<p style='color: green;'>Stock añadido correctamente</p>";
            $conexion = null;
            header('Refresh:3;url=index.php');
        }
    ?>
</body>
</html>
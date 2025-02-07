<?php
if (isset($_REQUEST['dni'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    // Comprueba si ya existe un cliente con el DNI introducido 
    $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni='$_REQUEST[dni]'");
    // $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni=".$_POST['dni']); Da error de syntaxis
    if ($consulta->rowCount() > 0) {
?>
        Ya existe un cliente con DNI <?= $_REQUEST['dni'] ?><br>
        Por favor, vuelva a la <a href="index.php">página de alta de cliente</a>.
<?php
    } else {
        $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES 
        ('$_REQUEST[dni]','$_REQUEST[nombre]','$_REQUEST[direccion]','$_REQUEST[telefono]')";
        //echo $insercion; 
        $conexion->exec($insercion);
        echo "Cliente dado de alta correctamente.";
        $conexion = null;
        header("refresh:3;url=index.php"); // nos redirije en 3 seg al index
    }
} else {
    header('Location:index.php');
}

<?php
session_start();

if (isset($_COOKIE['catalogo'])) {
    $catalogo = unserialize(base64_decode($_COOKIE['catalogo']));
}else{
    header('location:ejer9.php');
}

//Añadir aviones
if (isset($_REQUEST['nombre'])) {
    $catalogo["av04"] = [
        "nombre"=>$_REQUEST['nombre'],
        "precio"=>(float)$_REQUEST['precio'],
        "imagen"=>$_REQUEST['imagen'],
        "descripcion"=>$_REQUEST['descripcion']
    ];
    setcookie("catalogo",base64_encode(serialize($catalogo)),time()+3600);
    $_SESSION['catalogo'] = unserialize(base64_decode($_COOKIE['catalogo']));
}

//Eliminar aviones
if (isset($_REQUEST['identificador'])) {
    $key = $_REQUEST['identificador'];
    unset($catalogo[$key]);
    setcookie("catalogo",base64_encode(serialize($catalogo)),time()+3600);
}

//Modifcar avioones

if (isset($_REQUEST['keyMod'])) {
    $keyMod = $_REQUEST['keyMod'];
    $modificar = $_REQUEST['modificar'];
    
    $indices = ["nombre", "precio", "imagen", "descripcion"];
    
    for ($i=0; $i < count($modificar); $i++) { 
        if ($modificar[$i] != "" || $modificar[$i] != null) {
            if ($i===1) {
                $modificar[$i]=(float)$modificar[$i];
            }
            
            $catalogo[$keyMod][$indices[$i]] = $modificar[$i];
        }
    }
    setcookie("catalogo",base64_encode(serialize($catalogo)),time()+3600);
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
    <h1>Administración de Productos</h1>
    <h3>Añadir producto</h3>
    <form action="#" method="post">
        Introduce el nombre del producto : <input type="text" name="nombre" id=""><br>
        Introduce el precio del producto : <input type="number" name="precio" id=""><br>
        Introduce el nombre de la imagen : <input type="text" name="imagen" id=""><br>
        Introduce la descripcion : <input type="text" name="descripcion" id=""><br>
        <input type="submit" value="Añadir">
    </form>

    <h3>Eliminar producto</h3>
    <form action="#" method="post">
        <label for="identificador">Selecciona el identificador:</label>
        <select name="identificador" id="">
            <?php
            foreach ($catalogo as $key => $value) {
                ?>
                <option value="<?= $key ?>"><?= $value["nombre"]?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Eliminar">
    </form>


    <h3>Modificar el Producto</h3>
    <form action="" method="post">
    <label for="key">Selecciona el producto:</label>
        <select name="keyMod" id="">
            <?php
            foreach ($catalogo as $key => $value) {
                ?>
                <option value="<?= $key ?>"><?= $value["nombre"]?></option>
                <?php
            }
            ?>
        </select>
        <br>
        Introduce la modificacion del nombre : <input type="text" name="modificar[]" id=""><br>
        Introduce la modificacion del precio : <input type="number" name="modificar[]" id=""><br>
        Introduce la modificacion de la imagen : <input type="text" name="modificar[]" id=""><br>
        Introduce la modificacion de la descripcion : <input type="text" name="modificar[]" id=""><br>
        <input type="submit" value="Modificar"> 
    </form>
    <br>
    <a href="ejer9.php">Volver</a>
</body>
</html>
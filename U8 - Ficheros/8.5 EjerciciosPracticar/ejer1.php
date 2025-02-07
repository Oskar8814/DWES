<!-- Una función (tipo procedimiento, no hay valor devuelto) denominada escribirTresNumeros que reciba tres números 
enteros  como  parámetros  y  proceda  a escribir  dichos  números  en tres  líneas  en un  archivo  denominado 
datosEjercicio.txt. Si el archivo no existe, debe crearlo. -->

<?php
include 'funciones.php';
if (isset($_REQUEST['num']) && isset($_REQUEST['fichero'])) {
    escribirTresNumeros($_REQUEST['num'], $_REQUEST['fichero']);
}

if (isset($_REQUEST['verFichero'])) {
    header('location:file/'.$_REQUEST['verFichero']);
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
    <h1>Escribe tres numeros en un Fichero</h1>
    <form action="" method="post">
        <label for="n1">Número 1</label>
        <input type="number" name="num[]" id=""><br>
        <label for="n1">Número 2</label>
        <input type="number" name="num[]" id=""><br>
        <label for="n1">Número 3</label>
        <input type="number" name="num[]" id=""><br>
        <label for="fichero">Nombre del fichero</label>
        <input type="text" name="fichero" id=""><br>
        <input type="submit" value="Guardar">
    </form>

    <br><br>
    <form action="" method="post">
        <label for="fichero"> Ver un fichero:</label>
        <input type="text" name="verFichero" id="">
        <input type="submit" value="Enviar">
        
    </form>

</body>
</html>
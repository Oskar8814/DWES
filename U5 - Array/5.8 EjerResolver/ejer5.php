<!-- Realizar  una  aplicación web  que  permita  introducir  los  datos  de  unos  aspirantes  a  un trabajo. Para 
ello  en  la  página  principal  se  deberá  mostrar  un  formulario  para  introducir  los  siguientes  datos: 
Nombre, edad, años de experiencia y correo. Tendremos un botón para aceptar los datos introducidos 
del aspirante y otro para finalizar la lista de aspirantes. La aplicación deberá ir almacenando los datos 
de los aspirantes en un array asociativo, cuyo índice principal sea el nombre. Cuando se pulse el botón 
Finalizar,  se  enviarán  los  datos  a  otra  página  para  mostrar  el  listado  de  los  aspirantes,  y  como  se 
buscan un perfil joven, los mayores de 30 saldrán con el texto de color rojo. 
Si se carga la segunda página sin enviar el listado desde la primera, se mostrará un mensaje indicando 
que primero se deben introducir los aspirantes y un enlace a la primera página.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!isset($_REQUEST['nombre'])) {
            $nombre = " ";
            $edad = 0;
            $exp = 0;
            $correo = " ";
            $candidatos = [];

        }else{
            $nombre = $_REQUEST ['nombre'];
            $edad = $_REQUEST['edad'];
            $exp = $_REQUEST['exp'];
            $correo = $_REQUEST['correo'];
            $candidatos = unserialize(base64_decode($_REQUEST['aspirantes']));
            $candidatos [$nombre] =  ["edad" => $edad, "experiencia" => $exp, "correo" => $correo];
            //var_dump($candidatos);
        }
    ?>
    <h2>Introduce los datos del aspirante</h2>
    <form action="" method="post">
        <label for="nom">Nombre</label>
        <input type="text" name="nombre" id="" required><br>
        <label for="edad">Edad</label>
        <input type="number" name="edad" id="" required><br>
        <label for="exp">Experiencia</label>
        <input type="number" name="exp" id="" required><br>
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="" required><br><br>
        <input type="submit" value="Enviar datos del aspirante">
        <input type="hidden" name="aspirantes" value="<?= base64_encode(serialize($candidatos)) ?>">
    </form>
    <br><br>
    <form action="ejer5_aspirantes.php" method="post">
        <input type="hidden" name="listado" value="<?= base64_encode(serialize($candidatos)) ?>">
        <input type="submit" value="Listado de Aspirantes">
    </form>
</body>
</html>
<!-- Ejercicio 7 
Escribe un programa que guarde en una cookie el color de fondo (propiedad  background-color)  de una 
página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.  -->

<?php

$color = "#FFFFFF"; //Blanco por defecto
if (isset($_REQUEST['color'])) {
    $color = $_REQUEST['color'];
    setcookie("colorDeFondo",$color,time()+3600);
}elseif (isset($_COOKIE["colorDeFondo"])) {
    $color = $_COOKIE["colorDeFondo"];
}

if (isset($_REQUEST['borraCookies'])) {    
    setcookie("colorDeFondo", "", -1);
    unset($color);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 7 -- Cookies</title>
    <style>
        body{
            background-color: <?= $color ?>;
        }
    </style>
</head>
<body>
    <?php
    //Por si no usa el input color
    // $colores = [
    //     "azul" => "blue",
    //     "rojo" => "red",
    //     "verde" => "green",
    //     "amarillo" => "yellow",
    //     "negro" => "black",
    //     "turquesa" => "turquoise",
    //     "gris" => "gray",
    //     "morado" => "purple",
    //     "naranja" => "orange",
    //     "rosa" => "pink"
    // ];
    print_r($_COOKIE)
    ?>
    <form action="#" method="post">
        <label for="color">Selecciona un color:</label>
        <!-- Si no usa el input color -->
        <!-- <select name="color" id="color">
            <?php
            foreach ($colores as $colorEsp => $value) {
                ?>
                <option value="<?= $value ?>"><?= $colorEsp ?></option>
                <?php
            }
            ?>
        </select> -->
        <input type="color" name="color" id="">
        <input type="submit" value="Cambiar el color">
    </form>
    <form action="#" method="post">
        <input type="hidden" name="borraCookies" value="si">
        <input type="submit" value="Borrar cookies">
    </form>

    
    <br><br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
    Beatae tempore consequuntur corporis consectetur aut cupiditate excepturi atque soluta natus ab,<br>
    cumque aliquam eveniet et aperiam? Architecto eos cupiditate nemo accusamus.<br>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
    Beatae tempore consequuntur corporis consectetur aut cupiditate excepturi atque soluta natus ab,<br>
    cumque aliquam eveniet et aperiam? Architecto eos cupiditate nemo accusamus.<br>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
    Beatae tempore consequuntur corporis consectetur aut cupiditate excepturi atque soluta natus ab,<br>
    cumque aliquam eveniet et aperiam? Architecto eos cupiditate nemo accusamus.<br>


</body>
</html>
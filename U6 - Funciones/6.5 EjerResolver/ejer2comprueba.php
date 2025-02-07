<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
    <?php
    include 'controlAcceso.php';
    if (!isset($_REQUEST['valor'])) {
        header('location:ejer2.php');
    }
    if (isset($_REQUEST['valor'])) {
        $fila = $_REQUEST['fila'];
        $columna = $_REQUEST['columna'];
        $valor = $_REQUEST['valor'];
        $perfil = $_REQUEST['perfil'];
        $array = dameTarjeta($perfil);
        $correcto = $array[$fila-1][$columna];

        if (compruebaClave(dameTarjeta($perfil),$fila-1,$columna,$valor)) {
            $columna+=1;
            echo "FILA: $fila <br>";
            echo "COLUMNA: $columna <br>";
            echo "VALOR: $valor <br>";
            echo "TARJETA: $correcto <br>";
            echo "Clave correcta <br>";
            ?>
            <button><a href="https://ciclos.iesruizgijon.es">Continuar</a></button>
            <?php
        }else {
            $columna+=1;
            echo "FILA: $fila <br>";
            echo "COLUMNA: $columna <br>";
            echo "VALOR: $valor <br>";
            echo "TARJETA: $correcto <br>";
            echo "Clave incorrecta. Acceso restringido <br>";
            ?>
            <button><a href="ejer2.php">Volver</a></button>
            <?php
        }
    }
    ?>Aye
</body>
</html>
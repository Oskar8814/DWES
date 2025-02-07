<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menor{
            color: green;
        }
        .mayor{
            color: red;
        }
    </style>
</head>
<body>
    <p ></p>
    <?php
        if (!isset($_REQUEST['listado'])) {
            $listado = [];

        }else{
            $listado = unserialize(base64_decode($_REQUEST['listado']));

            if (count($listado) == 0) {
                echo "<h2>Primero debes introducir los aspirantes</h2>";
                ?>
                <a href="ejer5.php">Volver</a>
                <?php
            }else{
                foreach ($listado as $candidato => $datos) {
                    if ($datos["edad"]>30) {
                        echo "<p class='mayor' >Nombre: $candidato</p>  ";
                        foreach ($datos as $key => $value) {
                            echo "<p class='mayor'>$key: $value</p>  ";
                        }
                        echo "<br>";

                    }else{
                        echo "<p class='menor'>Nombre: $candidato</p>  ";
                        foreach ($datos as $key => $value) {
                            echo "<p class='menor'>$key: $value</p>  ";
                        }
                        echo "<br>";
                    }
                }
            }
        }
    ?>
</body>
</html>
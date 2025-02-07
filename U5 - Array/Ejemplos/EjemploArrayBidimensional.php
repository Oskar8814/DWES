<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $persona = array(
        array("nombre" => "Rosa", "estatura" => 168, "sexo" => "F"),
        array("nombre" => "Ignacio", "estatura" => 175, "sexo" => "M"),
        array("nombre" => "Daniel", "estatura" => 172, "sexo" => "M"),
        array("nombre" => "Rubén", "estatura" => 182, "sexo" => "M")
    );
    echo "<b>DATOS SOBRE EL PERSONAL<b><br><hr>";
    $numPersonas = count($persona);
    for ($i = 0; $i < $numPersonas; $i++) {
        echo "Nombre: <b>", $persona[$i]['nombre'], "</b><br>";
        echo "Estatura: <b>", $persona[$i]['estatura'], " cm</b><br>";
        echo "Sexo: <b>", $persona[$i]['sexo'], "</b><br><hr>";
    }

    for ($i = 0; $i < $numPersonas; $i++) {
        foreach($persona[$i] as $indice => $dato){
            echo "$indice: $dato <br>";
        }
        echo "<hr>";
    }

    foreach($persona as $elemento){
        foreach ($persona as $indice => $dato){
            echo "$indice: $dato <br>";
        }
        echo "<hr>";
    }
    ?>
</body>

</html>
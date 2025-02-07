<?php
if (isset($_REQUEST['personajes'])) {
    $personajes = [];
    for ($i = 1; $i < 9; $i++) { 
        $json = @file_get_contents("https://swapi.dev/api/people/?page=$i");
        if ($json) {
            $data = json_decode($json, true); // Decodificar en array asociativo
            if ($data && isset($data['results'])) {
                $personajes = array_merge($personajes, $data['results']); // Combinar los resultados
            }
        }
    }
    
     // var_dump($personajes);Ahora es un array con todos los personajes
} else {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes de Star Wars</title>
    <link rel="stylesheet" href="css/personajes.css">
</head>
<body>
    <h1>Listado de Personajes</h1>
    <p>Filtrar por Nombre</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="hidden" name="personajes">
        <input type="submit" value="Buscar">
    </form>
    <p>Filtrar por Planeta</p>
    <form action="" method="post">
        <input type="text" name="planeta" id="">
        <input type="hidden" name="personajes">
        <input type="submit" value="Buscar">
    </form>
    <form action="index.php" method="post">
            <input type="submit" value="Volver">
    </form>

    <?php
    if (!isset($_REQUEST['nombre'])&& !isset($_REQUEST['planeta'])) {
        ?>
        <div class="container">
            <?php
            foreach ($personajes as $personaje) {
                $url = $personaje['homeworld'];
                $datos2 = @file_get_contents($url);
                $planeta = json_decode($datos2);
                // var_dump($planeta);
                $planetaNombre = $planeta->name; 
                ?>
                <div class="card">
                    <h3>Nombre : <?= $personaje['name'] ?></h3>
                    <p>Estatura : <?= $personaje['height'] ?></p>
                    <p>Peso : <?= $personaje['mass'] ?></p>
                    <p>Color del pelo : <?= $personaje['hair_color'] ?></p>
                    <p>Color de la piel: <?= $personaje['skin_color'] ?></p>
                    <p>Color de los ojos: <?= $personaje['eye_color'] ?></p>
                    <p>Año de nacimiento: <?= $personaje['birth_year'] ?></p>
                    <p>Genero: <?= $personaje['gender'] ?></p>
                    <p>Planeta natal: <?= $planetaNombre ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }else {
        ?>
        <div class="container">
            <?php
            foreach ($personajes as $personaje) {
                $url = $personaje['homeworld'];

                $datos2 = @file_get_contents($url);
                $planeta = json_decode($datos2);
                $planetaNombre = $planeta->name; 

                // var_dump($planeta);
                if (isset($_REQUEST['nombre'])) {
                    $nombre = strtolower($personaje['name']);
                    $nombreBusq = strtolower($_REQUEST['nombre']);
                    if (str_contains($nombre,$nombreBusq)) {
                ?>
                
                <div class="card">
                    <h3>Nombre : <?= $personaje['name'] ?></h3>
                    <p>Estatura : <?= $personaje['height'] ?></p>
                    <p>Peso : <?= $personaje['mass'] ?></p>
                    <p>Color del pelo : <?= $personaje['hair_color'] ?></p>
                    <p>Color de la piel: <?= $personaje['skin_color'] ?></p>
                    <p>Color de los ojos: <?= $personaje['eye_color'] ?></p>
                    <p>Año de nacimiento: <?= $personaje['birth_year'] ?></p>
                    <p>Genero: <?= $personaje['gender'] ?></p>
                    <p>Planeta natal: <?= $planetaNombre ?></p>
                </div>
                <?php
                    }
                }
                if (isset($_REQUEST['planeta'])) {
                    $planetaBusq = strtolower($_REQUEST['planeta']); 
                    $planetaAux = strtolower($planetaNombre);
                    if (str_contains($planetaAux,$planetaBusq)) {
                        
                        ?> 
                <div class="card">
                    <h3>Nombre : <?= $personaje['name'] ?></h3>
                    <p>Estatura : <?= $personaje['height'] ?></p>
                    <p>Peso : <?= $personaje['mass'] ?></p>
                    <p>Color del pelo : <?= $personaje['hair_color'] ?></p>
                    <p>Color de la piel: <?= $personaje['skin_color'] ?></p>
                    <p>Color de los ojos: <?= $personaje['eye_color'] ?></p>
                    <p>Año de nacimiento: <?= $personaje['birth_year'] ?></p>
                    <p>Genero: <?= $personaje['gender'] ?></p>
                    <p>Planeta natal: <?= $planetaNombre ?></p>
                </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <form action="people.php" method="post">
            <input type="submit" value="Volver">
            <input type="hidden" name="personajes">
        </form>
        <?php
    }

    ?>
</body>
</html>
<?php
if (isset($_REQUEST['naves'])) {
    $naves = [];
    for ($i = 1; $i < 4; $i++) { 
        $json = @file_get_contents("https://swapi.dev/api/starships/?page=$i");
        if ($json) {
            $data = json_decode($json, true); // Decodificar en array asociativo
            if ($data && isset($data['results'])) {
                $naves = array_merge($naves, $data['results']); // Combinar los resultados
            }
        }
    }
    
    //var_dump($planetas);Ahora es un array con todos los planetas
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naves de Star Wars</title>
    <link rel="stylesheet" href="css/personajes.css">
</head>
<body>
    <h1>Listado de Naves</h1>
    <p>Filtrar por Nombre</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="hidden" name="naves">
        <input type="submit" value="Buscar">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Volver">
    </form>
    <?php
    if (!isset($_REQUEST['nombre'])) {
        ?>
        <div class="container">
            <?php
            foreach ($naves as $nave) {
                ?>
                <div class="card">
                    <h3>Nombre : <?= $nave['name'] ?></h3>
                    <p>Modelo : <?= $nave['model'] ?></p>
                    <p>Fabricante : <?= $nave['manufacturer'] ?></p>
                    <p>Precio : <?= $nave['cost_in_credits'] ?></p>
                    <p>Longitud : <?= $nave['length'] ?></p>
                    <p>Velocidad Atmosferica Max : <?= $nave['max_atmosphering_speed'] ?></p>
                    <p>Tripulacion : <?= $nave['crew'] ?></p>
                    <p>Pasajeros : <?= $nave['passengers'] ?></p>
                    <p>Capacidad de carga : <?= $nave['cargo_capacity'] ?></p>
                    <p>Consumibles : <?= $nave['consumables'] ?></p>
                    <p>Hipervelocidad : <?= $nave['hyperdrive_rating'] ?></p>
                    <p>MGLT : <?= $nave['MGLT'] ?></p>
                    <p>Clase : <?= $nave['starship_class'] ?></p>
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
        foreach ($naves as $nave) {
            $nombre = strtolower($nave['name']);
            $nombreBusq = strtolower($_REQUEST['nombre']);
            if (str_contains($nombre, $nombreBusq)) {
            
            ?>
                <div class="card">
                    <h3>Nombre : <?= $nave['name'] ?></h3>
                    <p>Modelo : <?= $nave['model'] ?></p>
                    <p>Fabricante : <?= $nave['manufacturer'] ?></p>
                    <p>Precio : <?= $nave['cost_in_credits'] ?></p>
                    <p>Longitud : <?= $nave['length'] ?></p>
                    <p>Velocidad Atmosferica Max : <?= $nave['max_atmosphering_speed'] ?></p>
                    <p>Tripulacion : <?= $nave['crew'] ?></p>
                    <p>Pasajeros : <?= $nave['passengers'] ?></p>
                    <p>Capacidad de carga : <?= $nave['cargo_capacity'] ?></p>
                    <p>Consumibles : <?= $nave['consumables'] ?></p>
                    <p>Hipervelocidad : <?= $nave['hyperdrive_rating'] ?></p>
                    <p>MGLT : <?= $nave['MGLT'] ?></p>
                    <p>Clase : <?= $nave['starship_class'] ?></p>
                </div>
            <?php
            }
        }
        ?>
        </div>
        <form action="starships.php" method="post">
            <input type="submit" value="Volver">
            <input type="hidden" name="naves">
        </form>
        <?php
    }
    ?>
</body>
</html>
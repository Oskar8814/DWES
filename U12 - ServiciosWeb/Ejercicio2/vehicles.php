<?php
if (isset($_REQUEST['vehiculos'])) {
    $vehiculos = [];
    for ($i = 1; $i < 4; $i++) { 
        $json = @file_get_contents("https://swapi.dev/api/vehicles/?page=$i");
        if ($json) {
            $data = json_decode($json, true); // Decodificar en array asociativo
            if ($data && isset($data['results'])) {
                $vehiculos = array_merge($vehiculos, $data['results']); // Combinar los resultados
            }
        }
    }
    
    //var_dump($vehiculos);Ahora es un array con todos los planetas
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos de Star Wars</title>
    <link rel="stylesheet" href="css/personajes.css">
</head>
<body>
    <h1>Listado de Vehiculos</h1>
    <p>Filtrar por Nombre</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="hidden" name="vehiculos">
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
            foreach ($vehiculos as $vehiculo) {
                ?>
                <div class="card">
                    <h3>Nombre : <?= $vehiculo['name'] ?></h3>
                    <p>Modelo : <?= $vehiculo['model'] ?></p>
                    <p>Fabricante : <?= $vehiculo['manufacturer'] ?></p>
                    <p>Precio : <?= $vehiculo['cost_in_credits'] ?></p>
                    <p>Longitud : <?= $vehiculo['length'] ?></p>
                    <p>Velocidad Atmosferica Max : <?= $vehiculo['max_atmosphering_speed'] ?></p>
                    <p>Tripulacion : <?= $vehiculo['crew'] ?></p>
                    <p>Pasajeros : <?= $vehiculo['passengers'] ?></p>
                    <p>Capacidad de carga : <?= $vehiculo['cargo_capacity'] ?></p>
                    <p>Consumibles : <?= $vehiculo['consumables'] ?></p>
                    <p>Clase : <?= $vehiculo['vehicle_class'] ?></p>
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
        foreach ($vehiculos as $vehiculo) {
            $nombre = strtolower($vehiculo['name']);
            $nombreBusq = strtolower($_REQUEST['nombre']);
            if (str_contains($nombre, $nombreBusq)) {
            
            ?>
                <div class="card">
                    <h3>Nombre : <?= $vehiculo['name'] ?></h3>
                    <p>Modelo : <?= $vehiculo['model'] ?></p>
                    <p>Fabricante : <?= $vehiculo['manufacturer'] ?></p>
                    <p>Precio : <?= $vehiculo['cost_in_credits'] ?></p>
                    <p>Longitud : <?= $vehiculo['length'] ?></p>
                    <p>Velocidad Atmosferica Max : <?= $vehiculo['max_atmosphering_speed'] ?></p>
                    <p>Tripulacion : <?= $vehiculo['crew'] ?></p>
                    <p>Pasajeros : <?= $vehiculo['passengers'] ?></p>
                    <p>Capacidad de carga : <?= $vehiculo['cargo_capacity'] ?></p>
                    <p>Consumibles : <?= $vehiculo['consumables'] ?></p>
                    <p>Clase : <?= $vehiculo['vehicle_class'] ?></p>
                </div>
            <?php
            }
        }
        ?>
        </div>
        <form action="vehicles.php" method="post">
            <input type="submit" value="Volver">
            <input type="hidden" name="vehiculos">
        </form>
        <?php
    }
    ?>
</body>
</html>
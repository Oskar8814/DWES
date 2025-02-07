<?php
include_once 'funciones.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['planetas'])) {
    $planetas = [];
    for ($i = 1; $i < 5; $i++) { 
        $json = @file_get_contents("https://swapi.dev/api/planets/?page=$i");
        if ($json) {
            $data = json_decode($json, true); // Decodificar en array asociativo
            if ($data && isset($data['results'])) {
                $planetas = array_merge($planetas, $data['results']); // Combinar los resultados
            }
        }
    }
    // $_SESSION['planetas']=$planetas;
    //var_dump($planetas);Ahora es un array con todos los planetas
} elseif (isset($_REQUEST['nombre'])) {
    $planetas = [];
    $nombre = $_REQUEST['nombre'];
    $json = @file_get_contents("https://swapi.dev/api/planets/?search=" . $nombre);
    $data = json_decode($json, true);
    $planetas = $data['results'];
    
    
    $terreno = traducirTexto($planetas[0]['terrain']);
    $planetas [0]['terrain']= $terreno;
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planetas de Star Wars</title>
    <link rel="stylesheet" href="css/personajes.css">
</head>
<body>
    <h1>Listado de Planetas</h1>
    <p>Filtrar por Nombre</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="submit" value="Buscar">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Volver">
    </form>
    <?php
        ?>
        <div class="container">
            <?php
            foreach ($planetas as $planeta) {
                ?>
                <div class="card">
                    <h3>Nombre : <?= $planeta['name'] ?></h3>
                    <p>Periodo de rotacion : <?= $planeta['rotation_period'] ?></p>
                    <p>Periodo Orbital : <?= $planeta['orbital_period'] ?></p>
                    <p>Diametro : <?= $planeta['diameter'] ?></p>
                    <p>Clima : <?= $planeta['climate']?></p>
                    <p>Gravedad : <?= $planeta['gravity'] ?></p>
                    <p>Terreno : <?= $planeta['terrain'] ?></p>
                    <p>Agua superficial : <?= $planeta['surface_water'] ?></p>
                    <p>Poblacion : <?= $planeta['population'] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    
        <form action="planet.php" method="post">
            <input type="submit" value="Volver">
            <input type="hidden" name="planetas">
        </form>
        <?php
    ?>
</body>
</html>
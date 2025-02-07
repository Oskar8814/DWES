<?php
if (isset($_REQUEST['personajes']) && isset($_REQUEST['pagina'])) {
    $personajes = [];
    $pagina = $_REQUEST['pagina'];
    $json = @file_get_contents("https://swapi.dev/api/people/?page=" . $_REQUEST['pagina']);
    $data = json_decode($json, true);
    $personajes = $data['results'];
    // var_dump($personajes);
}elseif (isset($_REQUEST['nombre'])) {
    $personajes = [];
    $nombre = $_REQUEST['nombre'];
    $json = @file_get_contents("https://swapi.dev/api/people/?search=" . $nombre);
    $data = json_decode($json, true);
    $personajes = $data['results'];
    $pagina = 1;
}else {
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
    <!-- Formulario de busqueda -->

    <p>Filtrar por Nombre</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="submit" value="Buscar">
    </form>

    <!-- Paginado -->
    <h3>Página <?= $pagina ?></h3>
    <?php
    for ($i=1; $i < 10; $i++) { 
        ?>
        <form action="" method="post">
            <input type="hidden" name="pagina" value="<?= $i ?>">
            <input type="submit" value="Página <?= $i ?>">
            <input type="hidden" name="personajes">
        </form>
        <?php
    }
    ?>
    <!-- Boton para volver al index -->
    <form action="index.php" method="post">
        <input type="submit" value="Volver">
    </form>

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
</body>

</html>
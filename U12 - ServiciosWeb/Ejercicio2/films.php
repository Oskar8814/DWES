<?php
if (isset($_REQUEST['peliculas'])) {
    $datos = @file_get_contents("https://swapi.dev/api/films/");
    $peliculas = json_decode($datos);
    // var_dump($peliculas);
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas Star Wars</title>
    <link rel="stylesheet" href="css/peliculas.css">
</head>

<body>

    <h1>Listado de Peliculas</h1>
    <p>Filtrar por titulo</p>
    <form action="" method="post">
        <input type="text" name="titulo" id="">
        <input type="hidden" name="peliculas">
        <input type="submit" value="Buscar">
    </form>

    <form action="index.php" method="post">
            <input type="submit" value="Volver">
        </form>
    <?php
    if (!isset($_REQUEST['titulo'])) {

    ?>
        <div class="container">

            <?php
            foreach ($peliculas->results as $pelicula) {
            ?>
                <div class="card">
                    <h3>Titulo: <?= $pelicula->title ?></h3>
                    <p>Episodio: <?= $pelicula->episode_id ?></p>
                    <p>Opening: <?= $pelicula->opening_crawl ?></p>
                    <p>Director: <?= $pelicula->director ?></p>
                    <p>Productores: <?= $pelicula->producer ?></p>
                    <p>Fecha de lanzamiento: <?= $pelicula->release_date ?></p>
                </div>
            <?php
            }
            ?>
        </div>

    <?php
    } else {
    ?>
        <div class="container">
            <?php
            foreach ($peliculas->results as $pelicula) {
                $titulo = strtolower($pelicula->title);
                $tituloB = strtolower($_REQUEST['titulo']);

                if (str_contains($titulo, $tituloB)) {
            ?>
                    <div class="card">
                        <h3>Titulo: <?= $pelicula->title ?></h3>
                        <p>Episodio: <?= $pelicula->episode_id ?></p>
                        <p>Opening: <?= $pelicula->opening_crawl ?></p>
                        <p>Director: <?= $pelicula->director ?></p>
                        <p>Productores: <?= $pelicula->producer ?></p>
                        <p>Fecha de lanzamiento: <?= $pelicula->release_date ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <form action="films.php" method="post">
            <input type="submit" value="Volver">
            <input type="hidden" name="peliculas">
        </form>
    <?php
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id=""><br>
        <label for="">Datos:</label>
        <label for="">Temperatura</label>
        <input type="checkbox" name="temperatura" id="" checked>
        <label for="">Humedad</label>
        <input type="checkbox" name="humedad" id="" checked>
        <label for="">Presion</label>
        <input type="checkbox" name="presion" id="" checked>
        <label for="">Viento</label>
        <input type="checkbox" name="viento" id="" checked><br>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if (isset($_REQUEST['ciudad'])) {
        $ciudad = $_REQUEST['ciudad'];
        $datos = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&units=metric&appid=32828219aa1ce8a9d55dee412fd93c62");

        $tiempo = json_decode($datos);

        if ($datos != false) {
            
            // var_dump($tiempo);
            ?>
            <h2>Datos de <?= $_REQUEST['ciudad'] ?></h2>
            <?php
            if (isset($_REQUEST['temperatura'])) {
                ?>
                <p>Temperatura: <?= $tiempo->main->temp ?> grados</p>
                <?php
            }
            if (isset($_REQUEST['humedad'])) {
                ?>
                <p>Humedad: <?= $tiempo->main->humidity ?> %</p>
                <?php
            }
            if (isset($_REQUEST['presion'])) {
                ?>
                <p>Presión: <?= $tiempo->main->pressure ?> mb</p>
                <?php
            }
            if (isset($_REQUEST['viento'])) {
                ?>
                <p>Viento: <?= $tiempo->wind->speed ?> m/s</p>
                <?php
            }
            
        } else {
            ?>
            <p>No se han recibido datos</p>
            <?php
        }
    }
    ?>
</body>
</html>
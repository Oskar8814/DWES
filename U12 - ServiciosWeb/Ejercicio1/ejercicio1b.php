<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="" method="post" class="p-4 border rounded shadow-sm">
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control">
            </div>

            <div class="form-group">
                <label>Datos:</label><br>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="temperatura" class="form-check-input" checked>
                    <label class="form-check-label">Temperatura</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="humedad" class="form-check-input" checked>
                    <label class="form-check-label">Humedad</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="presion" class="form-check-input" checked>
                    <label class="form-check-label">Presión</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="viento" class="form-check-input" checked>
                    <label class="form-check-label">Viento</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </form>
    </div>

    <?php
    if (isset($_REQUEST['ciudad'])) {
        $ciudad = $_REQUEST['ciudad'];
        $datos = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&units=metric&appid=32828219aa1ce8a9d55dee412fd93c62");

        $tiempo = json_decode($datos);
        // print_r($tiempo);
        if ($datos != false) {
            
            // var_dump($tiempo);
            ?>
            <div class="container mt-5">
                <div class="weather-info p-4 border rounded shadow-sm">

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
                </div>
            </div>
            <?php
                }
        } else {
            ?>
            <div class="container mt-5">
                <div class="weather-info p-4 border rounded shadow-sm">
                    <p>No se han recibido datos</p>
                </div>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
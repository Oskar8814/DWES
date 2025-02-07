<?php
if (isset($_REQUEST['cartas'])) {
    $parametros = '?cartas='. $_REQUEST['cartas'];
    $data = @file_get_contents("http://localhost//U12%20-%20ServiciosWeb/baraja/servidor/baraja.php".$parametros);
    mostrarDatos(json_decode($data));
}

function mostrarDatos($datos) {
    if ($datos->estado == 200) {
        echo "<p>".$datos->mensaje."</p>";

        foreach ($datos->cartas as $carta) {
            echo "<p>".$carta."</p>";
        }
        echo '<a href="index.php"> Volver</a>';
    }elseif ($datos->estado==400) {
        echo "<p> Error ".$datos->estado."</p>";
        echo "<p>".$datos->mensaje."</p>";
        echo '<a href="index.php"> Volver</a>';
    }
}
?>
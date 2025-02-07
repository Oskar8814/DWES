<?php
if (isset($_REQUEST['cantidad']) && isset($_REQUEST['conversion'])) {
    $parametros = '?cantidad='.$_REQUEST['cantidad'].'&conversion='. $_REQUEST['conversion'];
    $data = @file_get_contents("http://localhost//U12%20-%20ServiciosWeb/conversor/servidor/conversor.php".$parametros);
    mostrarDatos(json_decode($data));
}else {
    header('Location:index.php');
}

function mostrarDatos($datos){
    if ($datos->estado==200) {
        echo $datos->mensaje;
        echo "<br>";
        if ($datos->codigo == 1) {
            echo $datos->pesetas . " pesetas";
            echo "<br>";
            echo '<a href="index.php"> Volver</a>';
        }else {
            echo $datos->euros . " euros";
            echo "<br>";
            echo '<a href="index.php"> Volver</a>';
        }
    } elseif ($datos->estado==400) {
        echo "<p> Error ".$datos->estado."</p>";
        echo "<p>".$datos->mensaje."</p>";
        echo '<a href="index.php"> Volver</a>';
    }
}

?>
<?php

function guardar()
{
    $hoy = date("d-m-Y");
    $hoy = "#" . $hoy . "#";
    $fp = fopen("file/mascotas.txt", "r");
    $existeFecha = false;
    $filas = [];

    while (!feof($fp)) {
        $linea = fgets($fp);
        if (trim($linea) === $hoy) {
            $existeFecha = true;
        }
    }
    fclose($fp);


    $fp = fopen("file/mascotas.txt", "a");
    $mascotas = $_SESSION['mascota'];
    //Si la fecha no esta la ponemos
    if ($existeFecha == false) {
        fwrite($fp, $hoy . PHP_EOL);
    }

    foreach ($mascotas as $key => $value) {
        $linea = $key . "-" . $value["tipo"] . "-" . $value["edad"];
        fwrite($fp, $linea . PHP_EOL);
    }
    fclose($fp);
}
function obtenerFechas()
{
    $fp = fopen("file/mascotas.txt", "r");
    $fechas = [];

    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea = trim($linea);
        if (isset($linea[0])) {
            if ($linea[0] === "#") {
                $fechas[] = $linea;
            }
        }
    }

    fclose($fp);
    return $fechas;
}

function obtenerMascotas($fecha)
{
    $fp = fopen("file/mascotas.txt", "r");
    $mascotas = [];
    $fecha = trim($fecha);
    $fechaLinea = "";

    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea = trim($linea);
        if (isset($linea[0])) {
            if ($linea[0] === "#") {
                $fechaLinea = $linea;
            } elseif ($fechaLinea === $fecha) {
                $partes = explode("-", $linea);
                $mascotas[$partes[0]] = [
                    "tipo" => $partes[1],
                    "edad" => $partes[2]
                ];
            }
        }
    }
    fclose($fp);
    return $mascotas;
}

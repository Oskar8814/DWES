<?php

function cargaCatalogo(){
    $fp = fopen("file/catalogo.txt","r");
    $catalogo = [];
    while(!feof($fp)){
        $linea = fgets($fp);
        $linea = trim($linea);
        $partes = explode("-", $linea);
        $catalogo [$partes[0]]=[
            "nombre"=>$partes[1],
            "precio"=>(int)$partes[2],
            "imagen"=>$partes[3],
            "descripcion"=>$partes[4],
        ];
    }
    fclose($fp);
    return $catalogo;
}

function renovarCatalogo() {
    $fp = fopen("file/catalogo.txt", "w");
    $catalogo = $_SESSION['catalogo'];
    $total = count($catalogo); // Contar el total de elementos para evitar un salto de linea alfinal
    $contador = 0; 

    foreach ($catalogo as $id => $datos) {
        $contador++; 
        $linea = $id . "-" . $datos["nombre"] . "-" . $datos["precio"] . "-" . $datos["imagen"] . "-" . $datos["descripcion"];

        // Agregar salto de línea sólo si no es la última línea
        if ($contador < $total) {
            fwrite($fp, $linea . PHP_EOL);
        } else {
            fwrite($fp, $linea);
        }
    }
    fclose($fp);
}

?>
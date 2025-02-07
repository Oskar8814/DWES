<?php
function dameTarjeta($perfil){
    $administrador = [
        ["A1", "B1", "C1", "D1", "E1"],
        ["A2", "B2", "C2", "D2", "E2"],
        ["A3", "B3", "C3", "D3", "E3"],
        ["A4", "B4", "C4", "D4", "E4"],
        ["A5", "B5", "C5", "D5", "E5"]
    ];
    $usuario = [
        ["1A", "1B", "1C", "1D", "1E"],
        ["2A", "2B", "2C", "2D", "2E"],
        ["3A", "3B", "3C", "3D", "3E"],
        ["4A", "4B", "4C", "4D", "4E"],
        ["5A", "5B", "5C", "5D", "5E"]
    ];

    if (strtolower($perfil) === "administrador") {
        return $administrador;
    }
    if (strtolower($perfil) === "usuario") {
        return $usuario;
    }
    
}

function compruebaClave($matriz, $coordenadaF,$coordenadaC,$valor){
    if ($matriz[$coordenadaF][$coordenadaC] == $valor) {
        return true;
    }else {
        return false;
    }
}

function imprimeTarjeta($array){ //MODIFICARLO PARA QUE DEVUELVA EL HTML DE LA TABLA!!!
    $columnas = ['A', 'B', 'C', 'D', 'E'];
    $tabla = "";
    echo "<table>";
    echo "<tr><th></th>";
    foreach ($columnas as $key => $letra) {
        echo "<th>$letra</th>";
    }
    echo "</tr>";

    $aux =1;//Contabiliza las filas

    foreach ($array as $fila) {
        echo "<tr><th>$aux</th>"; //Imprime el numero de fila
        foreach ($fila as $celda) {
            echo "<td>$celda</td>";
        }
        echo "</tr>";
        $aux++;
    }
    echo "</table>";
}
?>
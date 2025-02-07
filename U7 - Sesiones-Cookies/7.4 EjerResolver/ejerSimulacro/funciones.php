<?php
function generaMatricula($marca) {
    $num = rand(100,999);
    $marcaFinal = substr($marca,strlen($marca)-3);
    $marcaFinal = strtoupper($marcaFinal);
    $matricula = $num.$marcaFinal;
    return $matricula; 
}
function parseFecha($fecha){
    $diasSemana = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $diaSemana = date("w",$fecha);
    $diaSemana = $diasSemana[$diaSemana];

    $fechaStr = $diaSemana."-".date("d-m-Y",$fecha);

    return $fechaStr;
}
?>
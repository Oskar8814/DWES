<?php
    $metodo = $_SERVER['REQUEST_METHOD'];
    $codEstado =200;
    if ($metodo=='GET') {
        if (isset($_REQUEST['cartas'])) {
            if ($_REQUEST['cartas']<=40 && $_REQUEST['cartas']>=1) {
                $cartas = generaCartas($_REQUEST['cartas']);
                $devolver['cartas']=$cartas;
                $mensaje = "Cartas repartidas correctamente";
            }else {
                $cartas = [];
                $devolver['cartas']=$cartas;
                $mensaje ="Error: Cantidad de cartas incorrecto";
                $codEstado =400;
            }
        }
    }

    $devolver ['estado']=$codEstado;
    $devolver ['mensaje']= $mensaje;
    echo json_encode($devolver);


    function generaCartas($cantidad) {
        $cartas = [];

        while (count($cartas)<$cantidad) {
            
            $numero=8;
            while ($numero == 8 || $numero == 9) {
                $numero = rand(1,12);
            }

            $palo = rand(1,4);
            $carta = "";

            switch ($numero) {
                case 10:
                    $numero = 'Sota';
                    break;
                case 11:
                    $numero = 'Caballo';
                    break;
                case 12:
                    $numero = 'Rey';
                    break;
                case 1:
                    $numero = 'As';
                    break;
                
                default:
                    break;
            }

            switch ($palo) {
                case 1:
                    $carta = (string)$numero." Oro";
                    break;
                case 2: 
                    $carta = (string)$numero." Copas";
                    break;
                case 3: 
                    $carta = (string)$numero." Espadas";
                    break;
                case 4: 
                    $carta = (string)$numero." Bastos";
                    break;
                default:
                    break;
            }
            
            if (!in_array($carta, $cartas)) {
                $cartas[]=$carta;
            }
        }

        return $cartas;
    }
?>
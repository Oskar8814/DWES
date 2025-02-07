<?php
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado =200;

if ($metodo = 'GET') {
    if (isset($_REQUEST['cantidad']) && isset($_REQUEST['conversion'])) {
        if ($_REQUEST['cantidad']>=0) {
            
            if ($_REQUEST['conversion'] == 1) {
                $pesetas = 166.386 * $_REQUEST['cantidad'];
                $devolver ['pesetas']= $pesetas;
                $codigo = 1;
                $mensaje = "Conversion a pesetas realizada correctamente.";
            }else if ($_REQUEST['conversion']==2) {
                $euros = round($_REQUEST['cantidad']/166.386 , 2) ;
                
                $devolver ['euros']= $euros;
                $codigo = 2;
                $mensaje = "Conversion a euros realizada correctamente.";
            }
        }else {
            $devolver['pesetas']= 0;
            $mensaje = "Cantidad incorrecta";
            $codEstado = 400;
            $codigo = 1;
        }
    }

}
$devolver['estado']=$codEstado;
$devolver['mensaje']= $mensaje;
$devolver['codigo']= $codigo;
echo json_encode($devolver);

?>
<?php
require_once 'Clientes.php'; 
require_once 'Avion.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado=200;
$mensaje = "OK"; 

if ($metodo == 'GET') {
    if (isset($_REQUEST['token'])) {

        //Comprobar que el cliente tiene token registrado
        $cliente = Clientes::getClientesByToken($_REQUEST['token']);
        
        if ($cliente) {
            //Aumentamos el registro de peticiones del cliente.
            $cliente->updatePeticiones();
            if (isset($_REQUEST['nombre'])) {
                $aviones = Avion::getAvionesByNombre($_REQUEST['nombre']);
            }elseif(isset($_REQUEST['min'])&&isset($_REQUEST['max'])){
                $aviones = Avion::getAvionesByPrecio($_REQUEST['min'],$_REQUEST['max']);
            }

            //Preparar el array que devolveremos por json
            if (count($aviones) == 0) {
                $mensaje = "PRODUCTO NO ENCONTRADO";
                $codEstado = 404;
                $devolver=[];
            } else {
                foreach ($aviones as $avion) {
                    $devolver[] = [
                        
                        'codigo' => $avion->getCodigo(),
                        'nombre' => $avion->getNombre(),
                        'precio' => $avion->getPrecio(),
                        'imagen' => $avion->getImagen()
                    ];
                } 
            }
        }else {
            $codEstado = 401;
            $mensaje = 'TOKEN NO REGISTRADO';
            $devolver=[];
        }
    }


}

setCabecera($codEstado,$mensaje);  
echo json_encode($devolver);

function setCabecera($codEstado, $mensaje) {   
    header("HTTP/1.1 $codEstado $mensaje");   
    header("Content-Type: application/json;charset=utf-8");   
}  
?>
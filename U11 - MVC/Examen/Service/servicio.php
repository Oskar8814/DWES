<?php
require_once '../Model/Usuario.php';
require_once '../Model/Incidencia.php';
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado=200;
$mensaje = "OK";
$devolver =[];
if ($metodo=='GET') {
    $resueltas = Incidencia::getIncidenciasByEstado("RESUELTA");


    if (isset($_REQUEST['descripcion'])) {
        $resueltasAux =[];
        foreach ($resueltas as $resuelta) {
            $descripcion = $resuelta->getDescripcion();
            if (str_contains($descripcion,$_REQUEST['descripcion'])) {
                $resueltasAux[]=$resuelta;
            }
        }
        $resueltas=$resueltasAux;
    }

    if (count($resueltas)>0) {
        foreach ($resueltas as $resuelta) {
            $usu = Usuario::getUsuarioById($resuelta->getAdmin());
            $devolver []=[
                'descripcion'=>$resuelta->getDescripcion(),
                'reparador'=> $usu->getNombre(),
                'fecha'=>$resuelta->getFecha()
            ]; 
        }
    }else {
        $mensaje = "NO ENCONTRADO";
        $codEstado = 404;
        $devolver = [];
    }
}elseif ($metodo=='PUT') {
    parse_str(file_get_contents("php://input"),$parametros);

    $usuario = Usuario::getUsuarioById($parametros['propietario']);
    $usuario2 = Usuario::getUsuarioById($parametros['destinatario']);
    
    if ($usuario && $usuario2) {
        $perfil=$usuario->getPerfil();
        $perfil2=$usuario2->getPerfil();
        if ($perfil=="admin" && $perfil2=="admin") {
            
            $incidencias = Incidencia::getIncidenciasResueltaByAdmin($usuario->getId());
            // var_dump($incidencias);
            if (count($incidencias)!=0 ) {
                foreach ($incidencias as $incidencia) {
                    Incidencia::cambioAdminIncidencias($usuario->getId(),$usuario2->getId());
                }
                $mensaje="INCIDENCIAS MODIFICADAS CORRECTAMENTE";
                $codEstado=200;
            }else {
                $mensaje="INCIDENCIAS NO ENCONTRADAS";
                $codEstado=404;
            }
        }else {
            $mensaje="USUARIOS NO ADMIN";
            $codEstado=409;
        }
    }else {
        $mensaje="USUARIO NO ENCONTRADO";
        $codEstado=404;
    }
}

setCabecera($codEstado,$mensaje);  
echo json_encode($devolver); 

function setCabecera($codEstado, $mensaje) {   
    header("HTTP/1.1 $codEstado $mensaje");   
    header("Content-Type: application/json;charset=utf-8");   
}

?>
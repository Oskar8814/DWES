<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';

    $metodo = $_SERVER['REQUEST_METHOD'];
    $codEstado=200;
    $mensaje = "OK"; 

    $devolver =[];
    if ($metodo=='GET') {
        if (isset($_REQUEST['nombre'])) {
            $usuarioAux = Usuario::getUsuarioByName($_REQUEST['nombre']);
            if ($usuarioAux) {
                $fotos = Foto::getFotosByUser($usuarioAux->getId());
                if (count($fotos)==0) {
                    $mensaje = "FOTOS NO ENCONTRADAS";
                    $codEstado = 404;
                    $devolver = [];
                }elseif (count($fotos)!=0 ) {
                    foreach ($fotos as $foto) {
                        $img = $foto->getImagen();
                        $nombre = explode(".", $img);
                        $url =  "http://Mi unidad/htdocs/U11 - MVC/simulacro/View/imagen/".$img;
                        $likes = Like::cuentaLikes($foto->getId());
                        $devolver[]=[
                            'nombre'=>$nombre[0],
                            'url'=>$url,
                            'likes'=>$likes
                        ];
                    }
                }
            }else {
                $mensaje = "USUARIO NO ENCONTRADO";
                $codEstado = 404;
                $devolver = [];
            }
        }
    
    }elseif ($metodo=='PUT') {
        // parse_str(file_get_contents("php://input"),$parametros);
        if (isset($_REQUEST['id_foto'])&& isset($_REQUEST['id_usuario'])) {
            
            $foto = Foto::getFotoById($_REQUEST['id_foto']);
            
            if ($foto) {
                $usuario = Usuario::getUsuarioById($_REQUEST['id_usuario']);
                if ($usuario) {
                    $foto->setId_usuario($_REQUEST['id_usuario']);
                    $foto->update();
                    $mensaje="FOTO MODIFICADA CORRECTAMENTE";
                    $codEstado=200;
                    
                }else{
                    $mensaje="AUTOR NO ENCONTRADO";
                    $codEstado=404;
                }
            }else{
                $mensaje="FOTO NO ENCONTRADA";
                $codEstado=404;
            }
        }else{
            $mensaje="PARAMETROS DE CONSULTA INCORRECTOS";
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
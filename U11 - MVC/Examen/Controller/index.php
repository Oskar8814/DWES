<?php
require_once '../Model/Usuario.php';
require_once '../Model/Incidencia.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['nombre']);
    unset($_SESSION['perfil']);
}

if (isset($_SESSION['perfil'])) {
    
    if ($_SESSION['perfil']=="user") {
        $estado = "PENDIENTE";
        $data['incidencias']= Incidencia::getIncidenciasByEstado($estado);
        
        include '../View/index_view1.php';
    }else {

        if (isset($_REQUEST['reparar'])) {
            $incidencia = Incidencia::getIncidenciaById($_REQUEST['idIncidencia']);
            $usuarioAux2 = Usuario::getUsuarioByNombre($_SESSION['nombre']);
            // var_dump($incidencia);
            $incidencia->setEstado("REPARANDO");
            $incidencia->setAdmin($usuarioAux2->getId());
            $incidencia->update();
        }
        
        if (isset($_REQUEST['soltar'])) {
            // $usuarioAux2 = Usuario::getUsuarioByNombre($_SESSION['nombre']);
            $incidencia = Incidencia::getIncidenciaById($_REQUEST['idIncidencia']);
            $incidencia->setEstado("PENDIENTE");
            $incidencia->setAdmin('NULL');
            $incidencia->update();
        }
        
        if (isset($_REQUEST['finalizada'])) {
            $usuarioAux2 = Usuario::getUsuarioByNombre($_SESSION['nombre']);
            $incidencia = Incidencia::getIncidenciaById($_REQUEST['idIncidencia']);
            $incidencia->setEstado("RESUELTA");
            $incidencia->setAdmin($usuarioAux2->getId());
            $incidencia->update();
            
        }
        
        $incPend= Incidencia::getIncidenciasByEstado("PENDIENTE");
        $usuarioAux = Usuario::getUsuarioByNombre($_SESSION['nombre']);
        $incAdm = Incidencia::getIncidenciasByAdmin($usuarioAux->getId());
        $data['incidenciasAdmin']=array_merge($incAdm,$incPend);
        include '../View/index_view2.php';
    }
    

}else {
    header('Location:../Controller/login.php');
}
?>
<?php
require_once '../Model/Usuario.php';
require_once '../Model/Incidencia.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['historico'])) {
    $usuarioAux=Usuario::getUsuarioByNombre($_SESSION['nombre']);

    $data['resueltas']=Incidencia::getIncidenciasResueltaByAdmin($usuarioAux->getId());

    include '../View/historicoResueltas_view.php';
}
?>
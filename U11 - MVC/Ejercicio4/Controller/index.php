<?php
require_once '../Model/Alumno.php';

//Obtener todos los datos de los alumnos de la BD
$data['alumnos'] = Alumno::getAlumnos();

//Cargamos la vista
include '../View/index_view.php';
?>
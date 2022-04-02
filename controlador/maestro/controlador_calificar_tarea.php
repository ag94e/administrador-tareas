<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_calificar_tarea.php';

$obj = new calificar();
$id_tarea = $_POST['id_tarea'];
$calificacion = $_POST['calificacion'];
$id_alumno = $_POST['id_alumno'];
$resultado = $obj->calificar_tarea($id_tarea, $calificacion, $id_alumno);
$tareas = json_encode($resultado);
exit($tareas);

?>
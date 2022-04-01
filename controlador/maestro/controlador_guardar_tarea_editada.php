<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_guardar_tarea_editada_por_maestro.php';

$obj = new guardar_tarea_editada();
$id_tarea = $_POST['id_tarea'];
$nombre_tarea = $_POST['nombre_tarea'];
$id_materia = $_POST['id_materia'];
$resultado = $obj->guardar_tarea_modificada_por_maestro($id_tarea, $nombre_tarea, $id_materia);
$tareas = json_encode($resultado);
exit($tareas);

?>
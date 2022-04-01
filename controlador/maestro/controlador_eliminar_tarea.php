<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_eliminar_tarea_maestro.php';

$obj = new eliminar_tarea();
$id_tarea = $_POST['id_tarea'];
$resultado = $obj->eliminar_tarea_por_id($id_tarea);
$tareas = json_encode($resultado);
exit($tareas);

?>
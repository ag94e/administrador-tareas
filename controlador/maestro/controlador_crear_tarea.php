<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_crear_tarea.php';

$obj = new crear_tarea();
$usuario = $_POST['usuario_maestro'];
$tarea = $_POST['nombre_tarea'];
$id_grupo = $_POST['id_grupo'];
$id_materia = $_POST['id_materia'];
$resultado = $obj->crear_tarea_nueva($tarea, $id_grupo, $id_materia, $usuario);
$tareas = json_encode($resultado);
exit($tareas);

?>
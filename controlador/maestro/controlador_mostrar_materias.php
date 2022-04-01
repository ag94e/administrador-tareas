<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_mostrar_materias.php';

$obj = new materia();
$usuario = $_POST['usuario'];
$grupo = $_POST['grupo'];
$resultado = $obj->mostrar_materias_por_maestro_y_grupo($usuario, $grupo);
$tareas = json_encode($resultado);
exit($tareas);

?>
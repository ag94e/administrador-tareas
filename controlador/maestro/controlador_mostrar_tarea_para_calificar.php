<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_mostrar_tareas_para_calificar.php';

$obj = new mostrar_tareas();
$usuario = $_POST['usuario_maestro'];
$resultado = $obj->mostrar_tareas_por_calificar($usuario);
$tareas = json_encode($resultado);
exit($tareas);

?>
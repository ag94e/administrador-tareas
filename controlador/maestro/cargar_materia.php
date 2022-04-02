<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_cargar_materias.php';

$obj = new cargar_materias();
$usuario = $_POST['usuario_maestro'];
$id_grupo = $_POST['id_grupo'];
$resultado = $obj->mostrar_materias($usuario, $id_grupo);
$tareas = json_encode($resultado);
exit($tareas);

?>
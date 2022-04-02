<?php 
session_start();
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/maestro/modelo_cargar_grupos.php';

$obj = new cargar_grupos();
$usuario = $_POST['usuario_maestro'];
$resultado = $obj->mostrar_grupos($usuario);
$tareas = json_encode($resultado);
exit($tareas);

?>
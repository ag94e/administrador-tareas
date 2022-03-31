<?php 
session_start();
if (!isset($_SESSION["nombre_alumno"])) {
    header("location: ../../app_tareas");
}
include '../../modelo/alumno/modelo_home.php';

$obj = new home();
$post_usuario = $_POST['usuario'];
$resultado = $obj->mostrar_tareas($post_usuario);
$tareas = json_encode($resultado);
exit($tareas);

?>
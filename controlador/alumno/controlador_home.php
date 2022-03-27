<?php
session_start();
include '../../modelo/alumno/modelo_home.php';

$obj = new home();
$usuario = $_POST['usuario'];
$resultado = $obj->mostrar_tareas($usuario);

if(empty($resultado)){
     $status = 0;
     exit(json_encode(["resultado" => $status]));
 }else{
    $tareas = json_encode($resultado);
    exit($tareas);
}
?>
<?php
session_start();
include '../../modelo/alumno/modelo_login.php';

$obj = new login();
$usuario = $_POST['usuario_alumno'];
$password = $_POST['password_alumno'];
$resultado = $obj->inicio_sesion($usuario,$password);

if(empty($resultado)){
    $status = 0;
    exit(json_encode(["resultado" => $status]));
}else{
    $status = 1;
    foreach($resultado as $r){
        $usuario_tabla = $r['usuario'];
        $nombre = $r['nombre_alumno'];
        $id_usuario = $r['id_alumno'];
    }
    $_SESSION["nombre_alumno"] = $nombre;
    $_SESSION["usuario"] = $usuario;
    $_SESSION["id_alumno"] = $id_usuario;

    exit(json_encode([
        "resultado" => $status,
        "usuario" => $usuario_tabla
    ]));
}
?>
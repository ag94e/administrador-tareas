<?php
session_start();
include '../../modelo/maestro/modelo_login.php';

$obj = new login();
$usuario = $_POST['usuario_maestro'];
$password = $_POST['password_maestro'];
$resultado = $obj->inicio_sesion($usuario,$password);

if(empty($resultado)){
    $status = 0;
    exit(json_encode(["resultado" => $status]));
}else{
    $status = 1;
    foreach($resultado as $r){
        $usuario_tabla = $r['usuario'];
        $nombre = $r['nombre'];
    }
    $_SESSION['usuario'] = $nombre;

    exit(json_encode([
        "resultado" => $status,
        "usuario" => $usuario_tabla
    ]));
}
?>
<?php
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];
include('enviar.php');

$obj = new enviar();
$resultado = $obj->enviar_correo($correo,$nombre,$mensaje);
exit(json_encode(["status" => "1"]));

?>
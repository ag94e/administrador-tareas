<?php
session_start();
include '../../modelo/alumno/modelo_subir_archivo.php';

$obj = new archivo();

$archivo_nombre = $_FILES['archivo']['name'];
$archivo_tipo   = $_FILES['archivo']['type'];
$archivo_temp   = $_FILES['archivo']['tmp_name'];
$archivo_size   = $_FILES['archivo']['size'];
$id_usuario = $_SESSION["id_alumno"];
$id_tarea = $_POST['id_tarea'];

if ($archivo_size > 0){
    $carpeta_usuario = '../../archivos/'.$id_usuario;
    if (!file_exists($carpeta_usuario)){
        mkdir($carpeta_usuario, 0777, true);
    }elseif(file_exists($carpeta_usuario.'/'.$archivo_nombre)){
        exit(json_encode([
            "mensaje" => "Ya has subido este archivo anteriormente, intenta con otro o cambia su nombre."
            ]));
    }
    $explode = explode('.', $archivo_nombre);
    $tipo_archivo = array_pop($explode);
    $rutaFinal = $carpeta_usuario . '/' . $archivo_nombre;
    
    if (move_uploaded_file($archivo_temp, $rutaFinal)){
        $resultado = $obj->subir_archivo($archivo_nombre, $tipo_archivo, $rutaFinal, $id_tarea);
        $mensaje = json_encode($resultado);
        exit($mensaje);
    }
} else {
    exit(json_encode([
    "mensaje" => "Hubo un error subiendo este archivo, verifica que sea correcto."
    ]));
}
?>
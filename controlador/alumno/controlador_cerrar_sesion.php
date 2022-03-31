<?php 
session_start();
if (!isset($_SESSION["nombre_alumno"])) {
    header("location: ../../app_tareas");
}

session_destroy();

exit(json_encode([
    "status" => "1"
]));

?>
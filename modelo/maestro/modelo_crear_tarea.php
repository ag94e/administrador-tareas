<?php
include 'conexion.php';

class crear_tarea{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function crear_tarea_nueva($tarea, $id_grupo, $id_materia, $usuario){
        $resultado = $this->db->query("
        INSERT INTO tarea (nombre_tarea, id_materia, id_maestro, id_grupo) 
        VALUES ('$tarea', '$id_materia', (SELECT id_maestro FROM maestro WHERE usuario = '$usuario'), '$id_grupo')");
        if ($resultado != 1) {
            $respuesta = "La tarea no se ha creado correctamente";
            $status = 0;
        }else{
            $respuesta = "¡La tarea se ha creado correctamente!";
            $status = 1;
        }
        return array(
            "respuesta" => $respuesta,
            "status" => $status
        );
    }
}

?>
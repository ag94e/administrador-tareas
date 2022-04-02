<?php
include 'conexion.php';

class calificar{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function calificar_tarea($id_tarea, $calificacion, $id_alumno){
        $resultado = $this->db->query("
            UPDATE archivo_alumno
                SET
                    calificacion = '$calificacion'
            WHERE id_tarea = '$id_tarea'
            AND id_alumno = '$id_alumno'
            ");
        if ($resultado != 1) {
            $respuesta = "La tarea no se ha modificado correctamente";
            $status = 0;
        }else{
            $respuesta = "La tarea se ha modificado correctamente.";
            $status = 1;
        }
        return array(
            "respuesta" => $respuesta,
            "status" => $status
        );
    }
}

?>
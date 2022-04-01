<?php
include 'conexion.php';

class guardar_tarea_editada{
    private $db;
    private $lista = array();

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function guardar_tarea_modificada_por_maestro($id_tarea, $nombre_tarea, $id_materia){
        $resultado = $this->db->query("
            UPDATE tarea
                SET
                    nombre_tarea = '$nombre_tarea',
                    id_materia = '$id_materia'
            WHERE id_tarea = '$id_tarea'");
        if ($resultado != 1) {
            $respuesta = "La tarea no se ha modificado correctamente, revise si puso una materia incorrecta o un nombre de tarea inválido";
        }else{
            $respuesta = "La tarea se ha modificado correctamente.";
        }
        return array(
            "respuesta" => $respuesta
        );
    }
}

?>

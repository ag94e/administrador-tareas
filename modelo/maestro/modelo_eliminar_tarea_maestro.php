<?php
include 'conexion.php';

class eliminar_tarea{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function eliminar_tarea_por_id($id){
        $resultado = $this->db->query("DELETE FROM tarea WHERE id_tarea = '$id'");
        if ($resultado != 1) {
            $respuesta = "La tarea no se ha eliminado correctamente, vuelva a revisar el dato de la tarea que quiso borrar";
            $status = 0;
        }else{
            $respuesta = "La tarea se ha eliminado correctamente.";
            $status = 1;
        }
        return array(
            "respuesta" => $respuesta,
            "status" => $status
        );
    }
}

?>
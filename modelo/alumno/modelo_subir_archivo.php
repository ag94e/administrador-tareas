<?php
include 'conexion.php';

class archivo{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function subir_archivo($nombre, $tipo, $ruta, $id_tarea){
        $resultado = $this->db->query("INSERT INTO archivo (nombre, tipo, archivo) VALUES ('$nombre', '$tipo', '$ruta')");
        
        if ($resultado != 1) {
            $respuesta = "El archivo no se ha subido correctamente, verifique el archivo, o bien, si persiste el error, hable con el maestro.";
        }else{
            $respuesta = "¡El archivo se ha subido correctamente!";
            $hora_de_envio = date('Y-m-d h:i:s');
            $actualizar_tarea = $this->db->query("UPDATE tarea SET fecha_de_entrega = '$hora_de_envio', id_archivo = (SELECT id_archivo FROM archivo ORDER BY id_archivo DESC LIMIT 1) WHERE id_tarea = '$id_tarea'");
            if($actualizar_tarea){
                $respuesta2 = "Se agregó el archivo a la tarea";
            }else{
                $respuesta2 = "Falló en agregar el archivo a su tarea, intente de nuevo.";
            }
        }

        return array(
            "respuesta" => $respuesta,
            "respuesta2" => $respuesta2
        );
    }
}

?>

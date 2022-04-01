<?php 
include 'conexion.php';

class archivo{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function subir_archivo($nombre_archivo, $tipo, $ruta_archivo, $id_tarea, $id_alumno){
        $resultado = $this->db->query("INSERT INTO archivo_alumno (nombre_archivo, tipo, ruta_archivo, id_tarea, id_alumno) 
                                        VALUES ('$nombre_archivo', '$tipo', '$ruta_archivo', '$id_tarea', '$id_alumno')");
        if ($resultado != 1) {
            $respuesta = "El archivo no se ha subido correctamente, verifique el archivo, o bien, si persiste el error, hable con el maestro.";
        }else{
            $respuesta = "¡El archivo se ha subido correctamente!";
        }
        return array(
            "respuesta" => $respuesta
        );
    }
}

?>

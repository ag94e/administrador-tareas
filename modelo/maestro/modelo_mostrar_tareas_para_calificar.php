<?php
include 'conexion.php';

class mostrar_tareas{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_tareas_por_calificar($usuario){
        $resultado = $this->db->query("
        SELECT T.nombre_tarea, AL.calificacion, AL.ruta_archivo, A.matricula, T.id_tarea, A.id_alumno, AL.nombre_archivo
        FROM tarea AS T
            INNER JOIN archivo_alumno AS AL ON AL.id_tarea = T.id_tarea
            INNER JOIN alumno AS A ON A.id_alumno = AL.id_alumno
        WHERE T.id_maestro = (SELECT id_maestro FROM maestro WHERE usuario = '$usuario')
        ");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "nombre_tarea" => $fila["nombre_tarea"],
                "calificacion" => $fila["calificacion"],
                "ruta_archivo" => $fila["ruta_archivo"],
                "matricula" => $fila["matricula"],
                "id_tarea" => $fila["id_tarea"],
                "id_alumno" => $fila["id_alumno"],
                "nombre_archivo" => $fila["nombre_archivo"]
            );
        }
        return $this->lista;
    }
}

?>
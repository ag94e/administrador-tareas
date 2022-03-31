<?php 
if (!isset($_SESSION["nombre_alumno"])) {
    header("location: ../../app_tareas");
}
include 'conexion.php';

class home{
    private $db;
    private $lista = array();

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_tareas($usuario){
        $resultado = $this->db->query("
        SELECT T.id_tarea, T.nombre_tarea, M.nombre_materia, T.fecha_limite, AR.fecha_entrega, AR.calificacion, AR.nombre_archivo
        FROM alumno AS AL
            INNER JOIN grupo AS G ON G.id_grupo = AL.id_grupo
            INNER JOIN tarea AS T ON T.id_grupo = AL.id_grupo
            INNER JOIN materia AS M ON M.id_materia = T.id_materia
            LEFT JOIN archivo_alumno AS AR ON (AR.id_alumno = AL.id_alumno AND AR.id_tarea = T.id_tarea)
        WHERE AL.id_alumno = (SELECT id_alumno FROM alumno WHERE usuario = '$usuario')");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "tabla_id" => $fila["id_tarea"],
                "tabla_nombre" => $fila["nombre_tarea"],
                "table_materia" => $fila["nombre_materia"],
                "tabla_limite" => $fila["fecha_limite"],
                "tabla_entrega" => $fila["fecha_entrega"],
                "tabla_calificacion" => $fila["calificacion"],
                "tabla_archivo" => $fila["nombre_archivo"],
            );
        }
        return $this->lista;
    }
}

?>

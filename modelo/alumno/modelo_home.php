<?php
include 'conexion.php';

class home{
    private $db;
    private $lista = array();

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_tareas($usuario){
        $resultado = $this->db->query("
        SELECT T.id_tarea, T.nombre AS nombre_tarea, M.nombre AS nombre_materia, T.fecha_limite, T.fecha_de_entrega, T.calificacion, T.id_archivo, A.nombre AS archivo 
	        FROM tarea AS T 
                INNER JOIN materia AS M ON T.id_materia = M.id_materia 
                LEFT JOIN archivo as A ON T.id_archivo = A.id_archivo
            WHERE T.id_grupo = (SELECT id_grupo FROM alumno WHERE alumno.usuario = '$usuario');");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "tabla_id" => $fila["id_tarea"],
                "tabla_nombre" => $fila["nombre_tarea"],
                "table_materia" => $fila["nombre_materia"],
                "tabla_limite" => $fila["fecha_limite"],
                "tabla_entrega" => $fila["fecha_de_entrega"],
                "tabla_calificacion" => $fila["calificacion"],
                "tabla_archivo" => $fila["archivo"],
            );
        }
        return $this->lista;
    }
}

?>

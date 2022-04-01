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
        SELECT T.id_tarea, T.nombre_tarea, M.nombre_materia, G.nombre_grupo
            FROM tarea AS T
                INNER JOIN materia AS M ON M.id_materia = T.id_materia
                INNER JOIN grupo AS G ON G.id_grupo = T.id_grupo
            WHERE T.id_maestro = (SELECT id_maestro FROM maestro WHERE usuario = '$usuario')");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "tabla_id" => $fila["id_tarea"],
                "tabla_nombre" => $fila["nombre_tarea"],
                "tabla_materia" => $fila["nombre_materia"],
                "tabla_grupo" => $fila["nombre_grupo"]
            );
        }
        return $this->lista;
    }
}

?>

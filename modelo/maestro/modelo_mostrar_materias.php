<?php
include 'conexion.php';

class materia{
    private $db;
    private $lista = array();

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_materias_por_maestro_y_grupo($usuario, $grupo){
        $resultado = $this->db->query("
        SELECT M.nombre_materia, M.id_materia
            FROM tarea AS T
                INNER JOIN grupo AS G ON G.id_grupo = T.id_grupo
                INNER JOIN materia AS M ON M.id_materia = T.id_materia
            WHERE T.id_maestro = (SELECT id_maestro FROM maestro WHERE usuario = '$usuario')
            AND T.id_grupo = (SELECT id_grupo FROM grupo WHERE nombre_grupo = '$grupo')
        GROUP BY M.nombre_materia");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "nombre_materia" => $fila["nombre_materia"],
                "id_materia" => $fila["id_materia"],
            );
        }
        return $this->lista;
    }
}

?>

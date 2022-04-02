<?php
include 'conexion.php';

class cargar_materias{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_materias($usuario, $id_grupo){
        $resultado = $this->db->query("
        SELECT M.nombre_materia, M.id_materia
        FROM grupo_por_maestro AS GPM
            INNER JOIN grupo AS G ON G.id_grupo = GPM.id_grupo
            INNER JOIN materia_por_grupo AS MPG ON MPG.id_grupo = G.id_grupo
            INNER JOIN materia AS M ON M.id_materia = MPG.id_materia
        WHERE GPM.id_maestro = (SELECT id_maestro FROM maestro WHERE usuario = '$usuario')
        AND G.id_grupo = '$id_grupo'");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "nombre_materia" => $fila["nombre_materia"],
                "id_materia" => $fila["id_materia"]
            );
        }
        return $this->lista;
    }
}

?>
<?php
include 'conexion.php';

class cargar_grupos{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function mostrar_grupos($usuario){
        $resultado = $this->db->query("
        SELECT G.nombre_grupo, G.id_grupo FROM grupo AS G
            INNER JOIN grupo_por_maestro AS GPM ON GPM.id_grupo = G.id_grupo
            INNER JOIN maestro AS M ON M.id_maestro = GPM.id_maestro
        WHERE M.id_maestro = (SELECT id_maestro FROM maestro WHERE usuario = '$usuario')
        GROUP BY G.nombre_grupo");
        while($fila = mysqli_fetch_array($resultado)){
            $this->lista[] = array(
                "nombre_grupo" => $fila["nombre_grupo"],
                "id_grupo" => $fila["id_grupo"]
            );
        }
        return $this->lista;
    }
}

?>

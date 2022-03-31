<?php
if (!isset($_SESSION["nombre_maestro"])) {
    header("location: ../../app_tareas");
}
include 'conexion.php';

class login{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
    }

    public function inicio_sesion($usuario, $contra){
        $resultado = $this->db->query("SELECT * FROM maestro WHERE usuario='$usuario' AND pass='$contra' ");
        while($filas = $resultado->fetch_assoc()){
            $this->lista[] = $filas;
        }
        return $this->lista;
    }
}

?>

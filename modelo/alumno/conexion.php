<?php
class conexion{
    public static function conn(){
        $enlace = mysqli_connect("localhost", "root", "", "proyecto");
        $enlace -> set_charset("utf8");
        return $enlace;
    }
}
?>
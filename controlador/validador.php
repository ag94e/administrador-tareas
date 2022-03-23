<?php
session_start();

if(empty($_SESSION['login'])){
    header("Location: ../vista_login");
}else{
    header("Location: ../vista_home_alumno");
}


?>
<?php 
session_start();
  if (!isset($_SESSION["nombre_maestro"]))
   {
      header("location: ../app_tareas");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>
<body class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="vista_home_alumno">App de Tareas</a>
            <button class="btn btn-primary" onclick="cerrar_sesion_maestro()" >Cerrar sesión</button>
        </div>
    </nav>
    <br>
    <div class="d-flex justify-content-around">
        <h3>Bienvenido: <?php echo $_SESSION["nombre_maestro"]; ?></h3>
    </div>
    <br>
   <div class="container-fluid">
       <div class="row">
           <div class="col-6">
           <table class="d-flex justify-content-center table table-striped table-hover">
                <thead>        
                    <tr>
                        <td>Tarea</td>
                        <td>Fecha entrega</td>
                        <td>Materia</td>
                        <td>Grupo</td>
                        <td>Alumno</td>
                        <td>Calificación</td>
                    </tr>
                </thead>
            </table>
           </div>
       </div>
   </div>
    <script src="assets/js/alumno/home.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/cerrar_sesion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
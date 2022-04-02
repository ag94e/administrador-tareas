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
    <style>
table{
  table-layout: fixed;
}
#tabla_tarea th{
  width: 130px;
  overflow: auto;
  border: 1px solid;
}
    </style>
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
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
    <div class="row px-1">
        <div class="col-2">
        <a href="home_crear_tarea" class="link-dark"><button class="btn btn-success">Ir a crear tareas</button></a>
        <br>
        <br>
        <a href="home_calificar_tarea" class="link-dark"><button class="btn btn-info">Ir a calificar tareas</button></a>
        <br>
        <br>
        <!-- <a href="home_enviar_email" class="link-dark"><button class="btn btn-warning">Enviar Email</button></a> -->
        </div>
        <div class="col-10">
        <div class="container col-12">
            <table class="table table-striped table-hover" id="tabla_tareas">
                    <thead>        
                        <tr>
                            <th class='col-3'>Tarea</td>
                            <th class='col-3'>Materia</td>
                            <th class='col-2'>Grupo</td>
                            <th class='col-4'></th>
                        </tr>
                    </thead>
                    <tbody id="tareas">
                    </tbody>
            </table>
            </div>
        </div>
    </div>

    <script src="assets/js/maestro/home.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/cerrar_sesion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
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
            <a class="navbar-brand" href="vista_home_maestro">App de Tareas</a>
            <button class="btn btn-primary" onclick="cerrar_sesion_maestro()" >Cerrar sesión</button>
        </div>
    </nav>
    <br>
    <div class="row d-flex justify-content-around">
        <div class="col-2">
            <a class="ps-3" href="vista_home_maestro"><button class="btn btn-primary">Regresar</button></a>
        </div>
        <div class="col-10 text-center">
            <h3>Bienvenido: <?php echo $_SESSION["nombre_maestro"]; ?></h3>
            <input type="hidden" id="nombre_maestro" value="<?php echo $_SESSION["usuario"];?>">
        </div>
    </div>
    <br>
   <div class="container">
       <div class="row d-flex justify-content-center">
           <table class="table table-striped table-hover">
                <thead>        
                    <tr class="text-center">
                        <th class="col-3">Nombre de tarea</th>
                        <th class="col-2">Calificación</th>
                        <th class="col-3">Archivo</th>
                        <th class="col-2">Matrícula</th>
                        <th class="col-2"></th>
                    </tr>
                </thead>
                <tbody id="tareas">
                </tbody>
            </table>
       </div>
   </div>
    <script src="assets/js/maestro/calificar_tarea.js"></script>
    <script src="assets/js/cerrar_sesion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
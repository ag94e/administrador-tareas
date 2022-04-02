<?php 
session_start();
  if (!isset($_SESSION["nombre_maestro"]))
   {
      header("location: app_tareas");
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
    <div class="col-2">
            <a class="ps-3" href="vista_home_maestro"><button class="btn btn-primary">Regresar</button></a>
        </div>
    <div class="d-flex justify-content-around">
        <h3>Bienvenido: <?php echo $_SESSION["nombre_maestro"]; ?></h3>
    </div>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
    <div class="container-fluid">
    <label for="correo">Correo Electronico Destino</label>
    <input class="form-control" type="email" name="" id="correo" placeholder="Introduce correo destino"><br><br>
    <label for="nombre">Nombre emisor</label>
    <input class="form-control" type="text" name="" id="nombre" placeholder="Introduce tu nombre"><br><br>
    <label for="mensaje">Mensaje</label>
    <textarea class="form-control" name="" id="mensaje" cols="30" rows="10"></textarea>

    <button class="btn btn-primary" onclick="enviar_correo()">Enviar correo</button>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/cerrar_sesion.js"></script>
    <script src="assets/js/enviar_correo.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
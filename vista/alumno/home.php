<?php
session_start();
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
            <button class="btn btn-primary" onclick="cerrar_sesion_alumno()" >Cerrar sesión</button>
        </div>
    </nav>
    <br>
    <div class="d-flex justify-content-around">
        <h3>Bienvenido: <?php echo $_SESSION["nombre_alumno"]; ?></h3>
    </div>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="container text-left col-2">
               <p class="lead">Aquí se encuentra la información de las tareas asignadas de los profesores a tu grupo. <br><br>
                   Por favor, atiende las tareas antes de la fecha límite para evitar problemas. <br> <br>
                   ¡Éxito!
               </p>
            </div>
            <div class="container text-center col-10">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Materia</td>
                        <td>Fecha Límite</td>
                        <td>Fecha de entrega</td>
                        <td>Calificación</td>
                        <td>Archivo</td>
                    </tr>
                    </thead>
                    <tbody id="tareas">
                    </tbody>
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
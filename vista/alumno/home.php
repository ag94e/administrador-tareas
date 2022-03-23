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
<body>
    <h3>Bienvenido: <?php echo $_SESSION['usuario']; ?></h3>

    <button class="btn btn-primary" onclick="cerrar_sesion_alumno()" >Cerrar sesión</button>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/cerrar_sesion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
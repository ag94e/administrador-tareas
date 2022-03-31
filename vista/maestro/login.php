<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
    <title>Administración de tareas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-2">
        <img src="assets/img/books.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> 
        <a class="navbar-brand" href="app_tareas"> App de Tareas</a>
    </nav>
    <div class="m-0 row justify-content-center align-items-center">
        <div class="col-6 text-center">
            <form id="formulario_maestro" class="col-auto">
                <h3 class="text-center">Ingresa tus credenciales de maestro</h3>
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario_maestro" id="usuario_maestro" placeholder="Ingresa tu usuario">
                <br>
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password_maestro" id="password_maestro" placeholder="Ingresa tu password">
                <br><br>
                <input class="btn btn-primary btn-lg col-12" type="button" onclick="login_maestro()" value="Entrar">
            </form>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
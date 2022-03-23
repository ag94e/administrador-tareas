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
<body class="row align-items-center vh-100">
    <div class="d-flex justify-content-between">
        <div class="container col-5">
            <form id="formulario_alumno">
                <h3 class="text-center">¿Eres alumno? Ingresa <a href="">aquí.</a></h3>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario_alumno" id="usuario_alumno" placeholder="Ingresa tu usuario">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password_alumno" id="password_alumno" placeholder="Ingresa tu password">
                </div>
                <input class="btn btn-primary" type="button" onclick="login_alumno()" value="Entrar">
            </form>
        </div>
        <div class="container col-5">
            <form id="formulario_maestro">
                <h3 class="text-center">¿Eres maestro? Ingresa <a href="">aquí.</a></h3>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario_maestro" id="usuario_maestro" placeholder="Ingresa tu usuario">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password_maestro" id="password_maestro" placeholder="Ingresa tu password">
                </div>
                <input class="btn btn-primary" type="button" onclick="login_maestro()" value="Entrar">
            </form>
        </div>
    </div>
    

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
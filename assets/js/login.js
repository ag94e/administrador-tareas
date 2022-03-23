function login(user, pass, form, login, home) {
    let username = document.getElementById(user)
    let password = document.getElementById(pass)

    if (username.value == '' || password.value == ''){
        Swal.fire(
            'Ningún campo debe estar vacío',
            'Por favor, escribe tu usuario y contraseña',
            'error'
          )
    }
    else {
        let formulario = new FormData(document.getElementById(form));
        fetch(login, {
            method: "post",
            body: formulario })
            .then((response) => response.json())
            .then(data => {
                toastr.options = {"preventDuplicates": true}
                if (data.resultado == 0){
                    toastr.error("Las credenciales son equivocadas.", "Falló la autenticación")
                } else {
                    toastr.success(`Bienvenido ${data.usuario}`, "Autenticación correcta")
                    setTimeout(function(){
                        location.href=home;
                     },1000);
                }
            })
    }
}

function login_maestro(){
    login('usuario_maestro', 'password_maestro', 'formulario_maestro', 'controlador_login_maestro', 'vista_home_maestro')
}

function login_alumno(){
    login('usuario_alumno', 'password_alumno', 'formulario_alumno', 'controlador_login_alumno', 'vista_home_alumno')
}
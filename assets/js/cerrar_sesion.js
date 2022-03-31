function cerrar_sesion(url){
    Swal.fire({
        title: '¿Cerrar sesión?',
        text: "Una vez cerrada, volverás al inicio.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cerrar sesión'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: "post" })
                .then((response) => response.json())
                .then(data => {
                    if(data.status == "1"){
                        location.href="app_tareas"
                    }
                })
        }
      })
}

function cerrar_sesion_alumno(){
    cerrar_sesion('controlador_cerrar_sesion_alumno')
}

function cerrar_sesion_maestro(){
    cerrar_sesion('controlador_cerrar_sesion_maestro')
}
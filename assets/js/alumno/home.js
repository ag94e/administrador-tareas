window.onload = function () {   
    let usuario = this.document.getElementById("usuario")

    if(usuario.value == null || usuario.value == ""){
        location.href = "vista_home_alumno"
    }else{
        let formulario = new FormData()
        formulario.append("usuario", usuario.value)
        fetch("controlador_home_alumno", {
            method: "post",
            body: formulario})
            .then(response => response.json())
            .then(tareas => {
                let template = ''
                let tabla = document.getElementById("tareas")
                if(tareas.length > 0){
                    tareas.forEach(tarea => {
                        template += `<tr> <td>
                            ${tarea.tabla_nombre} </td> <td>
                            ${tarea.tabla_materia} </td> <td>
                            ${tarea.tabla_calificacion == null ? "" : tarea.tabla_calificacion} </td> <td>
                            ${tarea.tabla_archivo == null ? "<input class='form-control' type='file' name='archivo' id='tarea"+tarea.tabla_id+"'> <br> <input type='submit' class='btn btn-success' value='Subir' formenctype='multipart/form-data' onclick='subir_archivo(`tarea"+tarea.tabla_id+"`, "+tarea.tabla_id+")'>" : tarea.tabla_archivo} </td> </tr>
                        `})
                    tabla.innerHTML = template
                }else{
                    template = ` <tr> <td>
                    No hay información </td> <td>
                    No hay información </td> <td>
                    No hay información </td> <td>
                    No hay información </td> </tr>
                    `
                    tabla.innerHTML = template
                }
            })
            .catch(error => {
                alert("Hubo un error en la busqueda de este alumno, hable a su tutor para validar esta información.")
                fetch('controlador_cerrar_sesion_alumno', {
                    method: "post" })
                    .then((response) => response.json())
                    .then(data => {
                        if(data.status == "1"){
                            location.href="app_tareas"
                        }
                    })
            })
    }
}

function subir_archivo(id, id_tarea){
    let formulario = new FormData()
    let archivo = document.getElementById(id)
    formulario.append('archivo', archivo.files[0])
    formulario.append('id_tarea', id_tarea)
    if (archivo.files.length != 0){
        fetch('controlador_subir_archivo_alumno', {
            method: "post",
            body: formulario})
        .then(response => response.json())
        .then(data => {
            Swal.fire(
                'Gracias!',
                `${data.respuesta}`,
                'success'
              )
            setTimeout(function(){
                location.href='vista_home_alumno';
             },1000);
        })
        .catch(error => {
            if (confirm("El archivo no se ha subido correctamente.")) {
                console.error(error)
                location.href='vista_home_alumno'
            } else {
                location.href='vista_home_alumno'
            }
        })
    }else{
        Swal.fire(
            'Sin archivo',
            'Por favor, sube un archivo para cargar',
            'warning'
          )
    }
}
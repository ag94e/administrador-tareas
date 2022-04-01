window.onload = function () {
    let usuario = this.document.getElementById("usuario")

    if(usuario.value == null || usuario.value == ""){
        location.href = "vista_home_maestro"
    }else{
        let formulario = new FormData()
        formulario.append("usuario", usuario.value)
        fetch("controlador_home_maestro", {
            method: "post",
            body: formulario})
            .then(response => response.json())
            .then(tareas => {
                let template = ''
                let tabla = document.getElementById("tareas")
                if(tareas.length > 0){
                    tareas.forEach(tarea => {
                        template += `<tr> <td id="nombre${tarea.tabla_id}">
                            ${tarea.tabla_nombre} </td> <td id="materia${tarea.tabla_id}" >
                            ${tarea.tabla_materia} </td> <td id="grupo${tarea.tabla_id}" >
                            ${tarea.tabla_grupo} </td> <td id="boton_creado${tarea.tabla_id}">
                            <button class="btn btn-success btn-sm" onclick="editar_tarea('${tarea.tabla_id}', '${tarea.tabla_nombre}', '${tarea.tabla_grupo}' )">Editar</button>
                            <button class="btn btn-danger btn-sm" onclick="eliminar_tarea('${tarea.tabla_id}')" >Eliminar</button>
                            </td>
                            </tr>
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
            // .catch(error => {
            //     alert("Hubo un error en la busqueda de este alumno, hable con un supervisor para revisar este error.")
            //     fetch('controlador_cerrar_sesion_maestro', {
            //         method: "post" })
            //         .then((response) => response.json())
            //         .then(data => {
            //             if(data.status == "1"){
            //                 location.href="app_tareas"
            //             }
            //         })
            // })
    }
}

function editar_tarea(id_tarea, tabla_nombre, grupo){
    var usuario = document.getElementById("usuario").value
    const button = document.createElement('button')
    button.type = 'button'
    button.className = 'btn btn-primary btn-sm'
    button.innerText = 'Guardar'
    button.id = `boton${id_tarea}`
    document.getElementById(`boton_creado${id_tarea}`).appendChild(button)
    formulario = new FormData()
    formulario.append("usuario", usuario)
    formulario.append("grupo", grupo)

    function materias(formulario){
        return new Promise((resolver, reject) => {
            fetch('controlador_mostrar_materias_maestro', {
                method: "post",
                body: formulario})
                .then((response) => {
                    if(response.ok){
                        return response.json()
                    }
                    reject("error" + response.status)
                })
                .then((json) => resolver(json))
                .catch((err) => reject(err))
        })
    }
    document.getElementById(`nombre${id_tarea}`).innerHTML =  '<input type="text" id="tarea_nombre'+id_tarea+'" class="form-control" value="' + tabla_nombre + '"/>'

    materias(formulario)
    .then(materias => {
        let template = ''
        let nombre_materia = document.getElementById(`materia${id_tarea}`)
        template += `<select name="select" class="form-control" id="select${id_tarea}">`
        if (materias.length>0){
            materias.forEach(materia => {
                template += `
                <option value="${materia.id_materia}"> ${materia.nombre_materia} </option>
                `
            })
            template += '</select>'
            nombre_materia.innerHTML = template
        }
        button.onclick = function () {
            let id_materia = document.getElementById(`select${id_tarea}`).value
            let nombre_tarea = document.getElementById(`tarea_nombre${id_tarea}`).value
            console.log(id_materia)
            console.log(nombre_tarea)
            console.log(id_tarea)
            formulario = new FormData()
            formulario.append("id_tarea", id_tarea)
            formulario.append("nombre_tarea", nombre_tarea)
            formulario.append("id_materia", id_materia)

            fetch('controlador_guardar_tarea_editada_maestro', {
                method: "post",
                body: formulario})
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    Swal.fire(
                        'Gracias!',
                        `${data.respuesta}`,
                        'success'
                        )
                    setTimeout(function(){
                        location.href='vista_home_maestro';
                        },2000);
                })

        }
    })
}

function eliminar_tarea(id){
    let formulario = new FormData()
    formulario.append("id_tarea", id)
    Swal.fire({
        title: '¿Deseas eliminar esta tarea?',
        text: "Dando clic en confirmar se borrara esta tarea.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar tarea'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch('controlador_eliminar_tarea_maestro', {
                method: "post",
                body: formulario
                })
                .then((response) => response.json())
                .then(data => {
                    if(data.status == "1"){
                        Swal.fire(
                            'Gracias!',
                            `${data.respuesta}`,
                            'success'
                            )
                        setTimeout(function(){
                            location.href='vista_home_maestro'
                            },2000);
                    }else{
                        alert("Hubo un problema al intentar eliminar esta tarea.")
                        setTimeout(function(){
                            location.href='vista_home_maestro'
                            },2000);
                    }
                })
        }
      })
}
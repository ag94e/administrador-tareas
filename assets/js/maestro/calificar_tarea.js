window.addEventListener("load", function () {
    let maestro = document.getElementById("nombre_maestro").value
    let formulario = new FormData()
    formulario.append("usuario_maestro", maestro)
    
    this.fetch('controlador_mostrar_tareas_maestro', {
        method:"post",
        body:formulario})
        .then((response) => response.json())
        .then(tareas => {
            let template = ''
            let tbody = this.document.getElementById("tareas")
            if(tareas.length > 0){
                tareas.forEach((tarea, index)=> {
                    template += `<tr> 
                    <td> ${tarea.nombre_tarea} </td>
                    <td> ${tarea.calificacion == null ? `<input class="form-control" type="text" id="calificacion${index}" value="">` : `<input class="form-control" type="text" id="calificacion${index}" value="${tarea.calificacion}"`} </td>
                    <td> <a href='${tarea.ruta_archivo.slice(6)}' target="_blank"> ${tarea.nombre_archivo} </a> </td>
                    <td> ${tarea.matricula} </td> 
                    <td> <button class="btn btn-success" onclick="calificar_tarea('${tarea.id_tarea}', '${tarea.id_alumno}', 'calificacion${index}')">Calificar</button> </td>
                    <input type="hidden" id="alumno${tarea.id_alumno}" value="${tarea.id_alumno}">
                    </tr>
                    `
                })
                tbody.innerHTML = template
            }else{
                template = ` <tr> <td>
                No hay información </td> <td>
                No hay información </td> <td>
                No hay información </td> <td>
                No hay información </td> <td>
                No hay información </td> </tr>
                `
                tbody.innerHTML = template
            }
        })
})

function calificar_tarea(id_tarea, id_alumno, calificacion){
    let calif = document.getElementById(calificacion).value
    let formulario = new FormData()
    formulario.append("id_tarea", id_tarea)
    formulario.append("calificacion", calif)
    formulario.append("id_alumno", id_alumno)

    fetch('controlador_calificar_tarea_maestro', {
        method:"post",
        body: formulario})
        .then((response)=>response.json())
        .then(data => {
            if(data.status == 1) {
                Swal.fire(
                    'Calificación agregada!',
                    `${data.respuesta}`,
                    'success'
                  )
                setTimeout(function(){
                    location.href='home_calificar_tarea'
                 },2000)
            }else{
                Swal.fire(
                    'Hubo un error al tratar de modificar la tarea',
                    'Por favor, intentelo mas tarde',
                    'warning'
                  )
                setTimeout(function(){
                    location.href='vista_home_maestro'
                 },2000)
            }
             
        })
}   
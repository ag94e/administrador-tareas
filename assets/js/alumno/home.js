window.addEventListener('load', function () {
    let usuario = this.document.getElementById("usuario")

    if(usuario.value == null || usuario.value == ""){
        location.href="vista_home_alumno";
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
                tareas.forEach(tarea => {
                template += `<tr> <td>
                    ${tarea.tabla_nombre} </td> <td>
                    ${tarea.table_materia} </td> <td>
                    ${tarea.tabla_limite} </td> <td>
                    ${tarea.tabla_entrega == null ? "" : tarea.tabla_entrega} </td> <td>
                    ${tarea.tabla_calificacion == null ? "" : tarea.tabla_calificacion} </td> <td>
                    ${tarea.tabla_archivo == null ? "<input class='form-control' type='file' id='"+tarea.tabla_id+"'> <br> <button class='btn btn-success' onclick='subir_archivo(value)'> Subir </button>" : tarea.tabla_archivo} </td> </tr>
                `})
            tabla.innerHTML = template
            })
    }
  }, false);

function subir_archivo(value){
    // alert("se subio el archivo")
    alert(value)
}
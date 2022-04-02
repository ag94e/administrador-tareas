window.addEventListener("load", function() {

    let maestro = document.getElementById("nombre_maestro").value
    let formulario = new FormData()
    formulario.append("usuario_maestro", maestro)

    function cargar_grupos(formulario){
        return new Promise((resolve, reject)=>{
            fetch('cargar_grupos_maestro', {
                method: "post",
                body: formulario})
            .then((response) => {
                if(response.ok){
                    return response.json()
                }
                reject("error" + response.status)
            })
            .then((json) => resolve(json))
            .catch((err) => reject(err))
        })
    }
    
    cargar_grupos(formulario)
    .then(grupos => {
        let template = ''
        let opciones_grupo = document.getElementById("grupos")
        if(grupos.length > 0){
            grupos.forEach(grupo => {
                template += `
                    <option value="${grupo.id_grupo}"> ${grupo.nombre_grupo} </option>
                `
            })
            opciones_grupo.innerHTML = template
        }
        let grupos_select = document.getElementById("grupos")
        grupos_select.addEventListener('click', (e) => {
            e.stopImmediatePropagation()

            function cargar_materias(formulario){
                return new Promise((resolve, reject)=>{
                    fetch('cargar_materias_maestro', {
                        method: "post",
                        body: formulario})
                    .then((response) => {
                        if(response.ok){
                            return response.json()
                        }
                        reject("error" + response.status)
                    })
                    .then((json) => resolve(json))
                    .catch((err) => reject(err))
                })
            }
            let maestro = document.getElementById("nombre_maestro").value
            let id_grupo = grupos_select.value
            let formulario = new FormData()
            formulario.append("usuario_maestro", maestro)
            formulario.append("id_grupo", id_grupo)

            cargar_materias(formulario)
            .then(materias => {
                let template = ''
                let opciones_materias = document.getElementById("materias")
                if(materias.length > 0){
                    materias.forEach(materia => {
                        template += `
                            <option value="${materia.id_materia}"> ${materia.nombre_materia} </option>
                        `
                    })
                    opciones_materias.innerHTML = template
                }
            })
        })
    })

})


function agregar_tarea(){
    let nombre_de_tarea = document.getElementById("nombre_tarea").value
    let id_de_grupo = document.getElementById("grupos").value
    let id_de_materia = document.getElementById("materias").value
    let maestro = document.getElementById("nombre_maestro").value

    if(nombre_de_tarea == '' || id_de_grupo == '' || id_de_materia == '' || maestro == ''){
        Swal.fire(
            'Ningún campo debe estar vacío',
            'Por favor, completa los campos',
            'error'
          )
    }else {
        let formulario = new FormData()
        formulario.append('nombre_tarea', nombre_de_tarea)
        formulario.append('id_grupo', id_de_grupo)
        formulario.append('id_materia', id_de_materia)
        formulario.append('usuario_maestro', maestro)
        fetch('controlador_crear_tarea_maestro', {
            method: "post",
            body: formulario})
        .then((response) => response.json())
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
    }
}
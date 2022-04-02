function enviar_correo(){
    var correo = document.getElementById('correo').value
    var nombre = document.getElementById('nombre').value
    var mensaje = document.getElementById('mensaje').value

    $.ajax({
        url:"enviar_correo.php",
        type:"post",
        data:`correo=${correo}&nombre=${nombre}&mensaje=${mensaje}`,
        success: function(resp){
            var respuesta = JSON.parse(resp)
            if(respuesta.status == "1"){
                Swal.fire(
                    'Correo enviado!',
                    '',
                    'success'
                  )
            }else{
                Swal.fire(
                    'Hubo un error al tratar de enviar el correo',
                    'Por favor, intentelo mas tarde',
                    'warning'
                  )
            }
        }
    })
}
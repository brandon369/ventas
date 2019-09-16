// EDITAR CLIENTE

$(document).on("click",".btnEditarCliente",function(){
    var docId = $(this).attr("idCliente");
    console.log(docId);
    var datos =  new FormData();
    datos.append("docId",docId);
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            console.log(respuesta);
            $("#editarDocumento").val(respuesta["docId"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarApellido").val(respuesta["apellido"]);
        },
        error: function (xhr, textStatus, errorMessage) {
    
            console.log(xhr.responseText);
    
        }
    });
})



// BORRAR CLIENTE
$(document).on("click",".btnBorrarCliente",function(){
    var docId = $(this).attr("idCliente");
    
    swal({
        title: '¿Esta seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acciòn!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar cliente'
    }).then((result) => {
        if(result.value){
            window.location = "index.php?ruta=clientes&docId="+docId;
        }
    });
})

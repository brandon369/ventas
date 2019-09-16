// EDITAR EMPLEADO
$(document).on("click",".btnEditarEmpleado",function(){
    var docId = $(this).attr("idEmpleado");
   
    var datos = new FormData();
    datos.append("docId",docId);

    $.ajax({
        url: "ajax/empleado.ajax.php",
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
            $("#passwordActual").val(respuesta["clave"]);
        },
        error: function (xhr, textStatus, errorMessage) {

            console.log(xhr.responseText);

        }
    });

})

// BORRAR EMPLEADO
$(document).on("click",".btnBorrarEmpleado",function(){
    var docId = $(this).attr("idEmpleado");
    
    swal({
        title: '¿Esta seguro de borrar el empleado?',
        text: "¡Si no lo está puede cancelar la acciòn!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar empleado'
    }).then((result) => {
        if(result.value){
            window.location = "index.php?ruta=empleado&docId="+docId;
        }
    });
})

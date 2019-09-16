$(document).on("click",".btnEditarProducto",function(){
    var codigo = $(this).attr("idProducto");
    
    var datos = new FormData();
    datos.append("codigo",codigo);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            console.log(respuesta);
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecio").val(respuesta["valor"]);
        },
        error: function (xhr, textStatus, errorMessage) {

            console.log(xhr.responseText);

        }
    });
})

$(document).on("click",".btnBorrarProducto",function(){
    var codigo = $(this).attr("idProducto");
    
    swal({
        title: '¿Esta seguro de borrar el producto',
        text: "¡Si no lo está puede cancelar la acciòn!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar producto'
    }).then((result) => {
        if(result.value){
            window.location = "index.php?ruta=productos&codigo="+codigo;
        }
    });
})

console.log("hola");
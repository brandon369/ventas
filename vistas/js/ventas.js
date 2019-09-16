$(document).on("click",".btnAgregarProducto",function(){
    var codigo =  $("#producto>option:selected").val();
    var nombre = $("#producto>option:selected").html();
    var cantidad = Number($("#cantidadProducto").val());
    var valor = Number($("#precioProducto").val());
    var total = Number(cantidad * valor);

 
    if(codigo =="" ){
        alert("Seleccione un producto");
        return;
    }
    if(cantidad <= 0){
        alert("Escoja una cantidad correcta");
    }else{
        
        $("#tablaProductos").append(
            '<tr>'+
            '<th scope="row" class="codigo">'+codigo+'</th>'+
            '<td>'+nombre+'</td>'+
            '<td class="cantidad">'+cantidad+'</td>'+
            '<td class="valorUnitario">'+valor+'</td>'+
            '<td class="totalProducto">'+total+'</td>'+
            '<td>'+
                '<div class="btn-group">'+
                    '<button type="button" class="btn btn-danger btnQuitarProducto"><i class="fa fa-times"></i></button>'+
                '</div>'+
            '</td>'+
            '</tr>');
            $("#producto").prop('selectedIndex',0);
            $("#cantidadProducto").val("");
            $("#precioProducto").val("");
        
            //calcular subtotal iva y total
            
            var totalC = $("#total").html();
            if(totalC === ""){
                var subTotal = 0;    
            }else{
                var subTotal =  Number($("#subTotal").html());    
            }
            
            var subTotal = Number(subTotal + total);
            var iva = Number(subTotal * 0.19);
            var totalCompra = Number(subTotal + iva);
                
            $("#subTotal").html(subTotal);
            $("#iva").html(iva);
            $("#total").html(totalCompra);
            $("#totalProductos").val(totalCompra);
        
        
            capturarProductos()
        

    }
    
    


})

$(document).on("change","#producto",function(){

    var p = $("#producto>option:selected").attr("p");
    $("#precioProducto").val(p);
    
})

$(document).on("change","#cantidadProducto",function(){
    var cantidad = $(this).val();
    var c = $("#producto>option:selected").attr("c");
    var stock = Number(c);
    var seleccionado = Number(cantidad);
    if(seleccionado > stock){
        $("#cantidadProducto").val("");
        swal({
            title: 'La cantidad supera el stock',
            text: "El stcok actual es de "+c+" ",
            type: "warning",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if(result.value){
                $("#cantidadProducto").val("");
            }
        });
    }
    
})

$(document).on("click",".btnQuitarProducto",function(){

    //sibling captura el hermano
    var total = $(this).parent().parent().siblings("td.totalProducto").html()

    var subTotal =  Number($("#subTotal").html());    
       
    var subTotal = Number(subTotal - total);
    var iva = Number(subTotal * 0.19);
    var totalCompra = Number(subTotal + iva);
        
    $("#subTotal").html(subTotal);
    $("#iva").html(iva);
    $("#total").html(totalCompra);
    $("#totalProductos").val(totalCompra);
    
    $(this).parent().parent().parent().remove();
    capturarProductos()

})

function capturarProductos(){
    
    var productos = [];
    var cantidad = $(".cantidad");
    var valorUnitario = $(".valorUnitario");
    var  codigo= $(".codigo");
    for(var i = 0; i < cantidad.length; i++){
        productos.push({
            "codigo": $(codigo[i]).html(),
            "cantidad": $(cantidad[i]).html(),
            "valorUnitario": $(valorUnitario[i]).html()
        })
    }

    var datos = JSON.stringify(productos);
    console.log(productos);
    $("#listaProductos").val(datos); 

}




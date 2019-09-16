<?php

class ControladorVentas{

    // MOSTRAR  VENTAS
    static public function ctrMostrarVenta($condicion){
        $respuesta = ModeloVentas::mdlMostrarVenta($condicion);
        return $respuesta;

    }

    // AGREGAR VENTA
    static public function ctrAgregarVenta(){
        if(isset($_POST["totalProductos"])){
                $listadProductos = json_decode($_POST["listadoProductos"] ,true);

                $tablaFactura = "tblfactura";
                $tablaFacturaProductos = "tblfacturaproductos";
                $tablaProductos = "tblproductos";
                $consecutivo = $_POST["consecutivo"];
    
                $totalFactura = $_POST["totalProductos"];
                $docIdCliente = $_POST["docIdEmpleado"];
                $docIdEmpleado = $_POST["clienteVenta"];
    
                // INSERSION TABLA FACTURA
                $datosFactura = array(
                    "consecutivo" => $_POST["consecutivo"],
                    "empleado" => $_POST["docIdEmpleado"],
                    "cliente" => $_POST["clienteVenta"],
                    "total" => $_POST["totalProductos"]
                );
                $insertFactura = ModeloVentas::mdlCrearFactura($tablaFactura,$datosFactura);
    
                if($insertFactura == "ok"){
    
                    // INSERCION TABLA FACTURA-PRODUCTOS
                    foreach ($listadProductos as $value) {
                        $codProducto =  $value["codigo"];
                        $cantidad =  $value["cantidad"];
                        $valor =  $value["valorUnitario"];
    
                        $datosFacturaProductos = array(
                            "consFactura" => $consecutivo,
                            "codProducto" => $codProducto,
                            "cantidad" => $cantidad ,
                            "valor" => $valor
                        );
           
                        $insertFacturaProductos = ModeloVentas::mdlCrearFacturaProductos($tablaFacturaProductos,$datosFacturaProductos);
    
                    }
    
                    // Descontar STOK TABLA PRODUCTOS
                    foreach ($listadProductos as $value) {
                        $codProducto =  $value["codigo"];
                        $cantidad =  $value["cantidad"];
    
                        $datosProductos = array(
                            "codProducto" => $codProducto,
                            "cantidad" => $cantidad
                        );
    
           
                        $actualizarProductos = ModeloVentas::mdlStockProductos($tablaProductos,$datosProductos);
                        
                        
                    }
                    
                    if($actualizarProductos == "ok" && $insertFacturaProductos == "ok"){
                        echo '<script> 
                        swal({
                            title: "Factura genera correctamente",
                            text: "¿Desea imprimir la factura?",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            cancelButtonText: "No",
                            confirmButtonText: "Si, imprimir factura"
                        }).then((result) => {
                            if(result.value){
                                window.open("vistas/libs/factura.php?consecutivo='.$consecutivo.'", "_blank");
                                window.location = "crear-venta";
                            }else{
                                
                                window.location = "crear-venta";
                            }
                        });
                            </script>'
                        ;
                    }else{
                        echo "Error al generar factura";
                    }
                }else{
                    var_dump("Error al ingresar factura");
                }

      

           


            

      

        }
    }
}
<?php

class ControladorProductos{

    // MOSTRAR PRODUCTOS
    static public function ctrMostrarProductos($item,$valor){
        $tabla = "tblproductos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor);

        return $respuesta;
    }

    static public function ctrCrearProducto(){
        if(isset($_POST['nuevoCodigo'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoNombre"]) &&
            preg_match('/^[0-9]+$/',$_POST["nuevoStock"]) &&
            preg_match('/^[0-9]+$/',$_POST["nuevoCodigo"]) &&
            preg_match('/^[0-9]+$/',$_POST["nuevoPrecio"])){

                $tabla = "tblproductos";
                $datos = array(
                    "codigo" => $_POST['nuevoCodigo'],
                    "nombre" => $_POST['nuevoNombre'],
                    "stock" => $_POST['nuevoStock'],
                    "valor" => $_POST['nuevoPrecio']
                );

                $respuesta = ModeloProductos::mdlCrearProducto($tabla,$datos);
                if($respuesta == "ok"){
                    echo '<script> 
                            swal({
                                type: "success",
                                title: "¡El producto ha sido agregado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=>{
                                if(result.value){
                                    window.location ="productos";
                                }
                            });
                        </script>'
                    ;
                }else{
                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡Error al crear producto!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {        
                            window.location = "productos";        
                            }
                        });
    
                  </script>';
                }
            }else{
                echo'<script>

                swal({
                    type: "error",
                        title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                        if (result.value) {  
                            window.location = "productos";
                        }
                    });
    
                </script>';
            }
        }
    }

    static public function ctrEditarPoducto(){
        if(isset($_POST['editarCodigo'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarNombre"]) &&
            preg_match('/^[0-9]+$/',$_POST["editarStock"]) &&
            preg_match('/^[0-9]+$/',$_POST["editarCodigo"]) &&
            preg_match('/^[0-9]+$/',$_POST["editarPrecio"])){

                $tabla = "tblproductos";
                $datos = array(
                    "codigo" => $_POST['editarCodigo'],
                    "nombre" => $_POST['editarNombre'],
                    "stock" => $_POST['editarStock'],
                    "valor" => $_POST['editarPrecio']
                );

                $respuesta = ModeloProductos::mdlEditarProducto($tabla,$datos);
                if($respuesta == "ok"){
                    echo '<script> 
                            swal({
                                type: "success",
                                title: "¡El producto ha sido actualizado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=>{
                                if(result.value){
                                    window.location ="productos";
                                }
                            });
                        </script>'
                    ;
                }else{
                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡Error al actualizar producto!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {        
                            window.location = "productos";        
                            }
                        });
    
                  </script>';
                }
            }else{
                echo'<script>

                swal({
                    type: "error",
                        title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                        if (result.value) {  
                            window.location = "productos";
                        }
                    });
    
                </script>';
            }
        }
        

    }

    static public function ctrBorrarPoducto(){
        if(isset($_GET['codigo'])){

            $tabla = "tblproductos";
            $datos = $_GET['codigo'];
            $respuesta = ModeloProductos::mdlBorrarProducto($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script> 
                        swal({
                            type: "success",
                            title: "¡El producto sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=>{
                            if(result.value){
                                window.location ="productos";
                            }
                        });
                    </script>'
                ;
            }
        }
    }

}


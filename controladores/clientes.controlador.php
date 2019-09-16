<?php

class ControladorClientes{

    // MOSTRAR CLIENTES
    static public function ctrMostrarCliente($item,$valor){
        $tabla = "tblcliente";

        $respuesta = ModeloClientes::mdlMostrarCliente($tabla,$item,$valor);

        return $respuesta;
    }

    // CREAR CLEINTE
    static public function ctrCrearCliente(){
        if(isset($_POST['nuevoDocumento'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoNombre"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoApellido"]) &&
            preg_match('/^[0-9]+$/',$_POST["nuevoDocumento"])){

                $tabla = "tblcliente";
                $datos = array(
                    "docId" => $_POST['nuevoDocumento'],
                    "nombre" => $_POST['nuevoNombre'],
                    "apellido" => $_POST['nuevoApellido']
                );

                $respuesta = ModeloClientes::mdlcrearCliente($tabla,$datos);
                if($respuesta == "ok"){
                    echo '<script> 
                    swal({
                        type: "success",
                        title: "¡El cliente ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=>{
                        if(result.value){
                            window.location ="clientes";
                        }
                    });
                </script>'
            ;
                }else{
                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡Error al registrar empleado!",
                          text: "El cliente ya esta registrado",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {        
                            window.location = "clientes";        
                            }
                        });
    
                  </script>';
                }


            }else{
                echo'<script>

                swal({
                      type: "error",
                      title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "clientes";

                        }
                    });

              </script>';
            }
           
        }
    }

    //EDITAR CLIENTE
    static public function ctrEditarCliente(){
        if(isset($_POST['editarDocumento'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarNombre"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarApellido"]) &&
            preg_match('/^[0-9]+$/',$_POST["editarDocumento"])){

                $tabla = "tblcliente";
                $datos = array(
                    "docId" => $_POST['editarDocumento'],
                    "nombre" => $_POST['editarNombre'],
                    "apellido" => $_POST['editarApellido']
                );

                $respuesta = ModeloClientes::mdleditarCliente($tabla,$datos);
                if($respuesta == "ok"){
                    echo '<script> 
                    swal({
                        type: "success",
                        title: "¡El cliente ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=>{
                        if(result.value){
                            window.location ="clientes";
                        }
                    });
                </script>'
            ;
                }else{
                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡Error al editar empleado!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {        
                            window.location = "clientes";        
                            }
                        });
    
                  </script>';
                }


            }else{
                echo'<script>

                swal({
                      type: "error",
                      title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "clientes";

                        }
                    });

              </script>';
            }
           
        }

    }

    //BORRAR CLIENTE
    static public function ctrBorrarCliente(){
        if(isset($_GET['docId'])){
            $tabla = "tblcliente";
            $datos = $_GET['docId'];

            $respuesta = ModeloClientes::mdlBorrarCliente($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script> 
                        swal({
                            type: "success",
                            title: "¡El cliente ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=>{
                            if(result.value){
                                window.location ="clientes";
                            }
                        });
                    </script>'
                ;
            }

        }
    }
}
<?php

class ControladorEmpleados{
    // INGRESO EMPLEADO
    static public function ctrIngresoEmpleado(){
        if(isset($_POST['ingDocumento'])){
            if(preg_match('/^[0-9]+$/', $_POST['ingDocumento'])
            && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])){ 
                $tabla = "tblempleado";
                $item = "docId";
                $valor = $_POST['ingDocumento'];

                $respuesta = ModeloEmpleados::mdlMostrarEmpleado($tabla,$item,$valor);

                $passIngresado = $_POST['ingPassword'];
                $passDb =$respuesta['clave'];

                if($respuesta['docId'] == $_POST['ingDocumento']){
                    if(password_verify($passIngresado,$passDb)){
                        
                        $_SESSION['iniciarSesion'] = "ok";
                        $_SESSION['nombre'] = $respuesta['nombre']." ".$respuesta['apellido'];
                        $_SESSION['docId'] = $respuesta['docId'];

                        
                        echo 
                            '<script>
                                window.location =  "dashboard";
                            </script>'
                        ;
                    }else{
                        echo '<br> <div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }


                }else{
                    echo '<br> <div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }
        }
    }

    // MOSTRAR EMPLEADO
    static public function ctrMostrarEmpleado($item,$valor){
        $tabla = "tblempleado";

        $respuesta = ModeloEmpleados::mdlMostrarEmpleado($tabla,$item,$valor);

        return $respuesta;
    }

    //CREAR EMPLEADO

    static public function ctrCrearEmpleado(){   
        if(isset($_POST['nuevoDocumento'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoApellido"]) &&
                preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoPassword"]) &&
                preg_match('/^[0-9]+$/',$_POST["nuevoDocumento"])){

                    $passwordIngresado = $_POST["nuevoPassword"];       
                    $opciones = array(
                        'cost' => 10 //10 es el default
                    );
                    
                    $password = password_hash($passwordIngresado, PASSWORD_BCRYPT,$opciones);

                    $tabla = "tblempleado";
                    $datos = array(
                        "docId" => $_POST['nuevoDocumento'],
                        "nombre" => $_POST['nuevoNombre'],
                        "apellido" => $_POST['nuevoApellido'],
                        "clave" => $password
                    );

                    $respuesta = ModeloEmpleados::mdlCrearEmpleado($tabla,$datos);

                    if($respuesta == "ok"){
                        echo '<script> 
                                swal({
                                    type: "success",
                                    title: "¡El Empleado ha sido guardado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then((result)=>{
                                    if(result.value){
                                        window.location ="empleado";
                                    }
                                });
                            </script>'
                        ;
                    }else{
                        echo'<script>

                        swal({
                              type: "error",
                              title: "¡Error al registrar empleado!",
                              text: "El empleado ya esta registrado",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {        
                                window.location = "empleado";        
                                }
                            });
        
                      </script>';
                    }


            }else{
                echo'<script>

                swal({
                      type: "error",
                      title: "¡El empleado no puede ir vacío o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "empleado";

                        }
                    });

              </script>';

            }


        }
    
    }

    // EDITAR EMPLEADO
    static public function ctrEditarEmpleado(){
        if(isset($_POST['editarDocumento'])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre']) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellido"])){


                if($_POST['editarPassword'] != ""){
                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){
                        $opciones = array(
                            'cost' => 10
                        );
    
                        $password = password_hash($_POST['editarPassword'], PASSWORD_BCRYPT,$opciones);
                    }else{
                        echo '<script> 
                                swal({
                                    type: "error",
                                    title: "¡La contraseña no puede ir vacia o llevar caracteres especiales!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value){
                                        window.location ="usuarios";
                                    }
                                });
                            </script>'
                        ;
                    }
                    
                }else{
                    $password = $_POST['passwordActual'];
                }

                $tabla = "tblempleado";
                $datos = array(
                    "docId" => $_POST['editarDocumento'],
                    "nombre" => $_POST["editarNombre"],
                    "apellido" => $_POST["editarApellido"],
                    "password" => $password
                );

                $respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla,$datos);
                
                if($respuesta == "ok"){
                    echo '<script> 
                            swal({
                                type: "success",
                                title: "¡El empleado ha sido editado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location ="empleado";
                                }
                            });
                        </script>'
                    ;
                }

            }else{
                echo '<script> 
                        swal({
                            type: "error",
                            title: "¡El empleado no puede ir vacío o llevar caracteres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=>{
                            if(result.value){
                                window.location ="empleado";
                            }
                        });
                    </script>'
                ;
            }






        }
    
    }

    //BORRAR EMPLEADO
    static public function ctrBorrarEmpleado(){
        if(isset($_GET['docId'])){
            $tabla = "tblempleado";
            $datos = $_GET['docId'];

            $respuesta = ModeloEmpleados::mdlBorrarEmpleado($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script> 
                swal({
                    type: "success",
                    title: "¡El Empleado ha sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result)=>{
                    if(result.value){
                        window.location ="empleado";
                    }
                });
            </script>'
        ;
            }
        }

    }
}
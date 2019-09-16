<?php
require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class AjaxEmpleado{
    // EDITAR EMPLEADO
    public $docId;
    public function ajaxEditarEmpleado(){
        $item = "docId";
        $valor = $this->docId;
        $respuesta = ControladorEmpleados::ctrMostrarEmpleado($item,$valor);
        echo json_encode($respuesta);

    }

}


// EDITAR EMPLEADO
if(isset($_POST['docId'])){

    $empleado = new AjaxEmpleado();
    $empleado -> docId = $_POST['docId'];
    $empleado -> ajaxEditarEmpleado();
}

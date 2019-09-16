<?php
 require_once '../controladores/clientes.controlador.php';
 require_once '../modelos/clientes.modelo.php';

class AjaxClientes{

    public $docId;
    public function ajaxEditarCliente(){
        $item = "docId";
        $valor = $this->docId;

        $respuesta = ControladorClientes::ctrMostrarCliente($item,$valor);
        echo json_encode($respuesta);

    }

}

if(isset($_POST['docId'])){
    $cliente = new AjaxClientes();
    $cliente -> docId = $_POST['docId'];
    $cliente -> ajaxEditarCliente();
}


<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

    public $codigo;
    public function ajaxEditarProducto(){
        $item = "codigo";
        $valor = $this->codigo;
        $respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);
        echo json_encode ($respuesta);

    }
}


if(isset($_POST["codigo"])){
    $productos = new AjaxProductos();
    $productos -> codigo = $_POST["codigo"];
    $productos -> ajaxEditarProducto();
}
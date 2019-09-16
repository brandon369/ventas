<?php

class ControladorFacturas{

    static public function ctrGenerarFacturaMaestro($consecutivo){
        $respuesta =  ModeloFacturas::mdlGenerarFacturaMaestro($consecutivo);
        return $respuesta;
        

    }

    static public function ctrGenerarFacturaDetalle($consecutivo){
        $respuesta =  ModeloFacturas::mdlGenerarFacturaDetalle($consecutivo);
    
        return $respuesta;

    }
}
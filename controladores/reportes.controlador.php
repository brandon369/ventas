<?php

class ControladorReportes{

    static public function ctrProdcutoMasVendido(){

        $respuesta = ModeloReportes::mdlProdcutoMasVendido();
        return $respuesta;
    }

    static public function ctrProdcutoMenosVendido(){

        $respuesta = ModeloReportes::mdlProdcutoMenosVendido();
        return $respuesta;
    }

    static public function ctrClienteMasFrecuente(){
        $respuesta = ModeloReportes::mdlClienteMasFrecuente();
        return $respuesta;

    }

    static public function ctrClienteMenosFrecuente(){
        $respuesta = ModeloReportes::mdlClienteMenosFrecuente();
        return $respuesta;
    }



    static public function ctrMejorEmpleado(){
        $respuesta = ModeloReportes::mdlMejorEmpleado();
        return $respuesta;

    }

    static public function ctrPeorEmpleado(){
        $respuesta = ModeloReportes::mdlPeorEmpleado();
        return $respuesta;
    }

}
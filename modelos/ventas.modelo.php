<?php
require_once "conexion.php";
class ModeloVentas{

    // MOSTRAR  VENTAS
    static public function mdlMostrarVenta($condicion){
        if($condicion == "cons"){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tblfactura ORDER BY consecutivo DESC LIMIT 1");
            $stmt -> execute();
            return  $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT fa.consecutivo, CONCAT(cl.nombre,' ',cl.apellido) as 'nombreCliente',CONCAT(em.nombre,' ',em.apellido) as 'nombreEmpleado', fa.total, fa.fecha FROM tblcliente as cl INNER JOIN tblfactura as fa on cl.docId = fa.cliente INNER join tblempleado as em on fa.empleado = em.docId ORDER BY `fa`.`consecutivo` ASC");
            $stmt -> execute();
            return  $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    // INSERTAR EN TABLA FACTURA

    static public function mdlCrearFactura($tablaFactura,$datosFactura){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaFactura(consecutivo,empleado,cliente,total) VALUES(:consecutivo,:empleado,:cliente,:total)");

        $stmt -> bindParam(":consecutivo",$datosFactura['consecutivo'], PDO::PARAM_INT);
        $stmt -> bindParam(":empleado",$datosFactura['empleado'], PDO::PARAM_INT);
        $stmt -> bindParam(":cliente",$datosFactura['cliente'], PDO::PARAM_INT);
        $stmt -> bindParam(":total",$datosFactura['total'], PDO::PARAM_INT);

        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }



    // INSERTAR EN TABLA FACTURA PRODUCTOS
        

    static public function mdlCrearFacturaProductos($tablaFacturaProductos,$datosFacturaProductos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaFacturaProductos VALUES(:consFactura,:codProducto,:cantidad,:valorUnitario)");
    
            $stmt -> bindParam(":consFactura",$datosFacturaProductos['consFactura'], PDO::PARAM_INT);
            $stmt -> bindParam(":codProducto",$datosFacturaProductos['codProducto'], PDO::PARAM_STR);
            $stmt -> bindParam(":cantidad",$datosFacturaProductos['cantidad'], PDO::PARAM_INT);
            $stmt -> bindParam(":valorUnitario",$datosFacturaProductos['valor'], PDO::PARAM_INT);
    
            
            if($stmt->execute()){
                return "ok";
            }else{
                return $stmt->errorInfo();
            }
    
            $stmt->close();
            $stmt = null;
    
    }
    


    //Descontar productos   
    static public function mdlStockProductos($tablaProductos,$datosProductos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos SET stock = stock - :cantidad WHERE codigo = :codigo");

        $stmt -> bindParam(":cantidad",$datosProductos['cantidad'] ,PDO::PARAM_INT);
        $stmt -> bindParam(":codigo",$datosProductos['codProducto'] ,PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return $stmt->errorInfo();
        }

        $stmt->close();
        $stmt = null;
    }

}
<?php
require_once "conexion.php";

class ModeloFacturas{

    static public function mdlGenerarFacturaMaestro($consecutivo){
        $stmt = Conexion::conectar()->prepare("SELECT fa.fecha, CONCAT(em.nombre,' ',em.apellido) AS empleado, CONCAT(cl.nombre,' ',cl.apellido)AS cliente,fa.total FROM tblcliente AS cl INNER JOIN tblfactura fa ON cl.docId = fa.cliente INNER JOIN tblempleado AS em on fa.empleado = em.docId WHERE fa.consecutivo = :consecutivo");

        $stmt->bindParam(":consecutivo",$consecutivo,PDO::PARAM_INT);

        $stmt->execute();

        return $stmt ->fetch();

    }


    static public function mdlGenerarFacturaDetalle($consecutivo){
        $stmt = Conexion::conectar()->prepare("SELECT fp.codProducto,fp.cantidad,fp.valorUnitario,p.nombre FROM tblfacturaproductos as fp INNER JOIN tblproductos as p on fp.codProducto = p.codigo where fp.consFactura = :consecutivo");

        $stmt->bindParam(":consecutivo",$consecutivo,PDO::PARAM_INT);

        $stmt->execute();

        return $stmt ->fetchAll();
    }
}
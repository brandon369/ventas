<?php
require_once "conexion.php";
class ModeloReportes{

    static public function mdlProdcutoMasVendido(){
        $stmt = Conexion::conectar()->prepare("SELECT p.nombre, p.codigo, SUM(fp.cantidad) AS cantidad FROM tblproductos AS p INNER JOIN tblfacturaproductos AS fp  on p.codigo = fp.codProducto GROUP BY p.codigo ORDER by cantidad  DESC  limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlProdcutoMenosVendido(){
        $stmt = Conexion::conectar()->prepare("SELECT p.nombre, p.codigo, SUM(fp.cantidad) AS cantidad FROM tblproductos AS p INNER JOIN tblfacturaproductos AS fp  on p.codigo = fp.codProducto GROUP BY p.codigo ORDER by cantidad limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }

    
    static public function mdlClienteMasFrecuente(){
    $stmt = Conexion::conectar()->prepare("SELECT CONCAT(cl.nombre,' ',cl.apellido) AS nombre, COUNT(f.consecutivo) AS cantidad FROM tblfactura as f INNER JOIN tblcliente as cl on f.cliente = cl.docId GROUP BY CONCAT(cl.nombre,' ',cl.apellido) ORDER BY cantidad DESC limit 1 ");

    $stmt->execute();
    return $stmt->fetch();

    }

    static public function mdlClienteMenosFrecuente(){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(cl.nombre,' ',cl.apellido) AS nombre, COUNT(f.consecutivo) AS cantidad FROM tblfactura as f INNER JOIN tblcliente as cl on f.cliente = cl.docId GROUP BY CONCAT(cl.nombre,' ',cl.apellido) ORDER BY cantidad limit 1 ");

        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlMejorEmpleado(){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(em.nombre,' ',em.apellido) AS nombre, COUNT(f.consecutivo) AS cantidad FROM tblfactura AS f INNER JOIN tblempleado AS em on f.empleado = em.docId GROUP BY CONCAT(em.nombre,' ',em.apellido) ORDER BY cantidad DESC  limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlPeorEmpleado(){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(em.nombre,' ',em.apellido) AS nombre, COUNT(f.consecutivo) AS cantidad FROM tblfactura AS f INNER JOIN tblempleado AS em on f.empleado = em.docId GROUP BY CONCAT(em.nombre,' ',em.apellido) ORDER BY cantidad limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }
}
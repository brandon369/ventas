<?php
require_once "conexion.php";
class ModeloClientes{
    // MOSTRAR Clientes

    static public function mdlMostrarCliente($tabla,$item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item,$valor, PDO::PARAM_INT);
            $stmt -> execute();
            return  $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return  $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlcrearCliente($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(:docId,:nombre,:apellido)");
        $stmt -> bindParam(":docId",$datos['docId'],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return $stmt->errorInfo();
        }
        $stmt -> close();
        $stmt = null;

    }

    static public function mdleditarCliente($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,apellido=:apellido WHERE docId = :docId");
        $stmt -> bindParam(":docId",$datos['docId'],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return $stmt->errorInfo();
        }
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlBorrarCliente($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE docId = :docId");
        $stmt -> bindParam(":docId",$datos,PDO::PARAM_INT);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        
        $stmt -> close();
        $stmt = null;
    }
}
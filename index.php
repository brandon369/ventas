<?php  
    // CONTROLADORES
    require_once 'controladores/plantilla.controlador.php';
    require_once 'controladores/productos.controlador.php';
    require_once 'controladores/clientes.controlador.php';
    require_once 'controladores/empleados.controlador.php';
    require_once 'controladores/ventas.controlador.php';
    require_once 'controladores/reportes.controlador.php';
    
    //MODELOS
    require_once 'modelos/productos.modelo.php';
    require_once 'modelos/clientes.modelo.php';
    require_once 'modelos/empleados.modelo.php';
    require_once 'modelos/ventas.modelo.php';
    require_once 'modelos/reportes.modelo.php';



    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrPlantilla();
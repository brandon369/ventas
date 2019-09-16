<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ventas</title>

   <!--======================================================= 
        PLUGUNS DE CSS 
===========================================================--> 

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">



<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



<!-- personl -->
<link rel="stylesheet" href="vistas/css/style.css">



<!--======================================================= 
      PLUGUNS DE JAVASCRIPT
===========================================================--> 

<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



 <!-- SweetAlert -->
 <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    
</head>

<body>


<?php
if(isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok" ){
  include "vistas/modulos/cabezote.php";
  if(isset($_GET['ruta'])){

    if($_GET['ruta'] == "ventas" ||
        $_GET['ruta'] == "productos" ||
        $_GET['ruta'] == "clientes" ||
        $_GET['ruta'] == "empleado" ||
        $_GET['ruta'] == "salir" ||
        $_GET['ruta'] == "crear-venta" ||
        $_GET['ruta'] == "dashboard"){

        include "vistas/modulos/".$_GET['ruta'].".php";
    }else{
        include "vistas/modulos/404.php";
    }

}else{
    include "vistas/modulos/dashboard.php";
}

include "vistas/modulos/footer.php";
}else{
  include "vistas/modulos/login.php";
}





?>

<script src="vistas/js/empleado.js"> </script>
<script src="vistas/js/clientes.js"> </script>
<script src="vistas/js/productos.js"> </script>
<script src="vistas/js/ventas.js"> </script>

</body>

</html>
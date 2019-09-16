<div class="wrapper">

    
<div class="form-signin">
    <form class="" method="POST">       
      <h2 class="form-signin-heading">Ventas</h2>
      <input type="number" class="form-control" name="ingDocumento" placeholder="Documento" required="" autofocus="" />
      <input type="password" class="form-control" name="ingPassword" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>   
    </form>
    <?php
        $ingresar = new ControladorEmpleados();
        $ingresar -> ctrIngresoEmpleado();
    ?>
</div>
</div>

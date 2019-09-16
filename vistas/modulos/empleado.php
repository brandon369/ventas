<div class="contenido container mt-2">
  <h2 class="text-center">Administrar Empleados</h2>


  <div class=" with-border mb-3" style="margin-bottom: 20px;">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">
      Agregar Empleado
    </button>
  </div>

  <table class="table tabla-negra">
    <thead>
      <tr>
        <th scope="col" style="width:10px">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Documento</th>
        <th scope="col" style="width:100px">Acciones</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $item= null;
        $valor = null;
        $mostrarEmpleados = ControladorEmpleados::ctrMostrarEmpleado($item,$valor);
        foreach($mostrarEmpleados as $key => $value):
      ?>
        <tr>
          <th scope="row"><?= $key+1?></th>
          <td><?= $value['nombre']?></td>
          <td><?= $value['apellido']?></td>
          <td><?= $value['docId']?></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-warning btnEditarEmpleado mr-4" idEmpleado="<?= $value['docId']?>" data-toggle="modal"
                data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btnBorrarEmpleado ml-4" idEmpleado="<?= $value['docId']?>"><i
                  class="fa fa-times"></i></button>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>



<!-- MODAL AGREGAR EMPLEADO -->
<div id="modalAgregarEmpleado" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST">
        <div class="modal-header" style="background:#4b5762;  color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class=modal-title>Agregar Empleado</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- DOCUMENTO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoDocumento"
                  placeholder="Ingresar Documento" required>
              </div>
            </div>


            <!-- NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre"
                  required>
              </div>
            </div>

            <!-- APELLIDO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido"
                  required>
              </div>
            </div>

            <!-- CONTRASEÑA -->
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingrese contraseña">                   
                </div>
              </div>

          </div>
        </div>

        

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Empleado</button>
        </div>

      </form>
      <?php
        $crearEmpleado = new ControladorEmpleados();
        $crearEmpleado -> ctrCrearEmpleado();
      ?>
    </div>
  </div>
</div>

<!-- MODAL EDITAR EMPLEADO -->
<div id="modalEditarEmpleado" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="POST">
          <div class="modal-header" style="background:#4b5762;  color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=modal-title>Editar Empleado</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
  
              <!-- DOCUMENTO -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="number" class="form-control input-lg" id="editarDocumento" name="editarDocumento"
                    placeholder="Ingresar Documento" required readonly>
                </div>
              </div>
  
  
              <!-- NOMBRE -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre"
                    required>
                </div>
              </div>
  
              <!-- APELLIDO -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" placeholder="Ingresar Apellido"
                    required>
                </div>
              </div>
  
              <!-- CONTRASEÑA -->
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Ingrese nueva contraseña">
                    <input type="hidden" id="passwordActual" name="passwordActual">
    
                  </div>
                </div>
                
            </div>
          </div>
  
          
  
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
  
      </form>
      <?php
        $editarUsuario = new ControladorEmpleados();
        $editarUsuario -> ctrEditarEmpleado();
      ?>
    </div>
  </div>
</div>

<?php
$borrarEmpleado = new ControladorEmpleados();
$borrarEmpleado -> ctrBorrarEmpleado();
?>
<?php 
    $productos = new ControladorProductos(); 
?>
<div class="contenido container mt-2">
    <h2 class="text-center">Administrar Productos</h2>


    <div class=" with-border mb-3" style="margin-bottom: 20px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar Producto
        </button>
    </div>

    <table class="table tabla-negra">
        <thead>
            <tr>
                <th scope="col" style="width:10px">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Valor</th>
                <th scope="col" style="width:100px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $item = null;
            $valor = null;
            $mostrarProductos = ControladorProductos::ctrMostrarProductos($item,$valor);

            foreach($mostrarProductos as $key => $value):
                $precio = number_format($value['valor'],0,",",".");

            ?>
                <tr>
                    <th scope="row"><?= $key+1?></th>
                    <td><?= $value['codigo']?></td>
                    <td><?= $value['nombre']?></td>
                    <td><?= $value['stock']?></td>
                    <td><?= "$ ".$precio?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning btnEditarProducto mr-4" idProducto="<?= $value['codigo']?>" data-toggle="modal"
                                data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnBorrarProducto ml-4" idProducto="<?= $value['codigo']?>"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>



<!-- MODAL AGREGAR PRODUCTO -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background:#4b5762;  color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class=modal-title>Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="number" class="form-control input-lg" name="nuevoCodigo"
                                    placeholder="Ingresar Codigo" required>
                            </div>
                        </div>


                        <!-- NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre"
                                    placeholder="Ingresar Nombre" required>
                            </div>
                        </div>

                        <!-- STOCK -->
                        <div class="form-group row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoStock" min="0"
                                        placeholder="Stock" step="any" required>
                                </div>
                            </div>

                            <!-- PRECIO -->
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                        <input type="number" class="form-control input-lg" name="nuevoPrecio" min="0"
                                            placeholder="Precio" step="any" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>

            </form>
            <?php
                $crearProducto = new ControladorProductos();
                $crearProducto -> ctrCrearProducto();
                
            ?>
        </div>
    </div>
</div>

<!-- MODAL EDITAR PRODUCTO -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background:#4b5762;  color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class=modal-title>Editar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="number" class="form-control input-lg" id="editarCodigo" name="editarCodigo"
                                    placeholder="Ingresar Codigo" readonly required>
                            </div>
                        </div>


                        <!-- NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"
                                    placeholder="Ingresar Nombre" required>
                            </div>
                        </div>

                        <!-- STOCK -->
                        <div class="form-group row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0"
                                        placeholder="Stock" step="any" required>
                                </div>
                            </div>

                            <!-- PRECIO -->
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                        <input type="number" class="form-control input-lg" id="editarPrecio"name="editarPrecio" min="0"
                                            placeholder="Precio" step="any" required>
                                    </div>
                                </div>
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
                $editarProducto = new ControladorProductos();
                $editarProducto -> ctrEditarPoducto();                
            ?> 
        </div>
    </div>
</div>

<?php
    $borrarProducto = new ControladorProductos();
    $borrarProducto -> ctrBorrarPoducto();                
?> 
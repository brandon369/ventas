<div class="contenido container mt-2">
    <h2 class="text-center">Crear Venta</h2>


    <form role="form" method="POST" action="">

        <div class="box-body">



            <!-- EMPLEADO VENTA -->
            <div class="form-group row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                        <input type="text" class="form-control input-lg" required readonly
                            value="<?= $_SESSION['nombre']?>">
                            <input type="hidden" name="docIdEmpleado" required value="<?= $_SESSION['docId']?>">
                    </div>
                </div>

                <!-- CLIENTE VENTA -->
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                        <select class="form-control input-lg" name="clienteVenta" id="clienteVenta" required>
                            <option value="">Selecionar Cliente</option>
                            <?php
                            $item = null;
                            $valor = null;
                            $productos = ControladorClientes::ctrMostrarCliente($item,$valor);
                            foreach($productos as $key => $value):?>

                            <option value="<?= $value['docId']?>"><?= $value['nombre'] . " ".$value['apellido']?>
                            </option>

                            <?php endforeach ?>

                        </select>

                    </div>
                </div>

                <!-- CONSECUTIVO VENTA -->
                <?php
                $condicion = "cons";
                    $consecutivo = ControladorVentas::ctrMostrarVenta($condicion);
                    $cons = $consecutivo['consecutivo'] + 1;
                ?>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                        <input type="number" name="consecutivo" required value="<?= $cons?>" class="form-control input-lg" id="consecutivoVenta" required readonly>
                    </div>
                </div>

            </div>

            <!-- PRODUCTO A AGREGAR VENTA -->
            <div class="form-group row">

                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <select class="form-control input-lg" id="producto">
                            <option value="">Selecionar producto</option>
                            <?php
                            $item = null;
                            $valor = null;
                            $productos = ControladorProductos::ctrMostrarProductos($item,$valor);
                            foreach($productos as $key => $value):?>

                            <option value="<?= $value['codigo']?>" id="product" c="<?= $value['stock']?>"
                                p="<?= $value['valor']?>"> <?= $value['nombre']?></option>


                            <?php endforeach ?>

                        </select>
                    </div>
                </div>
                <!-- PRECIO -->
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                        <input type="number" class="form-control input-lg" id="precioProducto" readonly>
                    </div>
                </div>
                <!-- CANTIDAD -->
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                        <input type="number" class="form-control input-lg" id="cantidadProducto">
                    </div>
                </div>

                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary btnAgregarProducto">Agregar producto</button>
                </div>

            </div>


        </div>



        <table class="table tabla-negra">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Total</th>
                    <th scope="col" style="width:10px;"></th>
                </tr>
            </thead>
            <tbody class="tablaProductos" id="tablaProductos">
            </tbody>
        </table>

        <div class="form-group row">
            <div class="col-sm-8">
            <button type="submit" class="btn btn-primary">Facturar</button>
            </div>
            <div class="col-sm-4">
                <table class="table tabla-negra">
                    <tbody class="tablaProductos" id="tablaProductos">
                        <tr>
                            <th scope="row">SubTotal</th>
                            <td id="subTotal"></td>
                        </tr>
                        <tr>
                            <th scope="row">Iva 19%</th>
                            <td id="iva"></td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td id="total"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- LSIATDO DE PRODUCTOS -->
        
        <input type="hidden" id="totalProductos" name="totalProductos" required>
        <input type="hidden" id="listaProductos" name="listadoProductos" required>
    </form>
    <?php
        $agregarVenta = new ControladorVentas();
        $agregarVenta -> ctrAgregarVenta();
    ?>


</div>

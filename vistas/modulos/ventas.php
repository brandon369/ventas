
<div class="contenido container mt-2">
    <h2 class="text-center">Administrar Ventas</h2>


    <div class=" with-border mb-3" style="margin-bottom: 20px;">
    <a href="crear-venta" style="color: #fff;">
        <button class="btn btn-primary">
             Agregar Venta
        </button>
        </a>
    </div>

    <table class="table tabla-negra">
        <thead>
            <tr>
           
                <th scope="col" style="width:20px">Consecutivo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Empleado</th>
                <th scope="col">Total</th>
                <th scope="col">Fecha</th>
                <th scope="col" style="width:100px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $condicion = "todo";
            $ventas = ControladorVentas::ctrMostrarVenta($condicion);
            foreach ($ventas as $key => $value):        
            $total = number_format($value['total'],0,",",".");
            ?>
           
                <tr>
                    
                    <td><?= $value['consecutivo']?></td>
                    <td><?= $value['nombreCliente']?></td>
                    <td><?= $value['nombreEmpleado']?></td>
                    <td><?=  "$"." ".$total?></td>
                    <td><?= $value['fecha']?></td>
                    <td><a href="vistas/libs/factura.php?consecutivo=<?= $value['consecutivo']?>" target="_blank">
                         <button class="btn btn-primary btnImprimirFactura ml-4" idFactura="<?= $value['consecutivo']?>"><i class="fa fa-print"></i></button>
                         </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
     
        </tbody>
    </table>
</div>




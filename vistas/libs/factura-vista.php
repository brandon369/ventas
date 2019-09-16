<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura de venta</title>
    <style type="text/css"> 
 
        img {
            max-width: 80px;
            float: left;
        }

        h1 {
            float: right;

        }

        th {
            padding-right: 10px;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,td{
            
            border-collapse: collapse;
            border: .5px solid black;
            text-align: center;
            padding: 0 20px;
        }
        tr th{
            text-align: center;
            padding: 0 20px;
        }
        .tabla td{
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="nombre">
        <img src="../img/logo-1913689_1280.png" alt="">
        <h1>Ventas</h1>
    </div>
    <br><br><br>
    <table class="datos">
        <?php
            $consecutivo = $_GET["consecutivo"];
            $respuesta = ControladorFacturas::ctrGenerarFacturaMaestro($consecutivo);
        ?>
        <tr>
            <th>Fantura N:</th>
            <td><?= $consecutivo?></td>
        </tr>
        <tr>
            <th>Empleado</th>
            <td><?= $respuesta["empleado"]?></td>
        </tr>
        <tr>
            <th>Cliente:</th>
            <td><?= $respuesta["cliente"]?></td>
        </tr>
        <tr>
            <th>Fecha:</th>
            <td><?= $respuesta["fecha"]?></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
 

    <table class="tabla" width="100%">

        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Valor</th>
            <th>Total</th>
           
        </tr>
        <?php
            $facturaDetalle = ControladorFacturas::ctrGenerarFacturaDetalle($consecutivo);
            foreach($facturaDetalle as $value):
                $total = $value["valorUnitario"] * $value["cantidad"];
                $valorUnitario = number_format($value['valorUnitario'],0,",",".");
                $total = number_format($total,0,",",".");

        ?>
            <tr>
                <td><?= $value["codProducto"]?></td>
                <td><?= $value["nombre"]?></td>
                <td><?= $value["cantidad"]?></td>
                <td><?= "$ ".$valorUnitario?></td>
                <td><?= "$ ".$total?></td>
     
            </tr>
        <?php endforeach ?>



    </table>
    <br>

    <table>
    <?php
        $totalCompra = number_format($respuesta["total"],0,",","."); 
        $subTotal1 = $respuesta["total"] * 100 / 119;
        $subTotal = number_format($subTotal1,0,",","."); 
        $iva = $subTotal1 * 0.19;
        $iva = number_format($iva,0,",","."); 
    ?>
        <tbody>
            <tr>
                <th>SubTotal</th>
                <td><?="$ ". $subTotal?></td>
            </tr>
            <tr>
                <th>Iva 19%</th>
                <td><?= "$ ".$iva?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td> <?="$ ". $totalCompra?></td>
            </tr>
        </tbody>
    </table>



</body>

</html>
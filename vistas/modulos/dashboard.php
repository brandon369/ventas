<?php 
    $masVendido = ControladorReportes::ctrProdcutoMasVendido();
    $menosVendido = ControladorReportes::ctrProdcutoMenosVendido();

    $clienteMasFrecuente = ControladorReportes::ctrClienteMasFrecuente();
    $clienteMenosFrecuente = ControladorReportes::ctrClienteMenosFrecuente();

    $mejorEmpleado = ControladorReportes::ctrMejorEmpleado();
    $peorEmpleado = ControladorReportes::ctrPeorEmpleado();

    
?>

<div class="contenido container mt-2">
    <h2 class="text-center">Dashboard</h2>

    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="row">

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PRODUCTO MAS VENDIDO</h4>
     
                            <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= $masVendido["nombre"]?></td>
                                    </tr>
                                    <tr>
                                        <th>Veces Vendido</th>
                                        <td><?= $masVendido["cantidad"]?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PRODUCTO MENOS VENDIDO</h4>
                            <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= $menosVendido["nombre"]?></td>
                                    </tr>
                                    <tr>
                                        <th>Veces Vendido</th>
                                        <td><?= $menosVendido["cantidad"]?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="row">

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">CLIENTE MAS FRECUENTE</h4>
                            <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= $clienteMasFrecuente["nombre"]?></td>
                                    </tr>
                                    <tr>
                                        <th>N Compras</th>
                                        <td><?= $clienteMasFrecuente["cantidad"]?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">CLIENTE MENOS FRECUENTE</h4>
                            <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= $clienteMenosFrecuente["nombre"]?></td>
                                    </tr>
                                    <tr>
                                        <th>N Compras</th>
                                        <td><?= $clienteMenosFrecuente["cantidad"]?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="row">

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">MEJOR EMPLEADO</h4>
                            <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= $mejorEmpleado["nombre"]?></td>
                                    </tr>
                                    <tr>
                                        <th>N Ventas</th>
                                        <td><?= $mejorEmpleado["cantidad"]?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PEOR EMPLEADO</h4>
                            <table>
                                <tr>
                                    <th>Nombre</th>
                                       <td><?= $peorEmpleado["nombre"]?></td>
                                </tr>
                                <tr>
                                    <th>N Ventas</th>
                                    <td><?= $peorEmpleado["cantidad"]?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>

</div>
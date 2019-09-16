<?php
require_once "../../controladores/factura.controlador.php";
require_once  "../../modelos/factura.modelo.php";
require_once "vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
ob_start();
require_once "factura-vista.php";
$html = ob_get_clean();

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($html);
$html2pdf->output("factura.pdf");


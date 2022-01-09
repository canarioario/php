<?php
include_once "./dompdf_1-1-1/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf(array('enable_remote' => true));
ob_start();
include "listadoImprimir.php";
$html = ob_get_clean() ;
$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->render();
$dompdf->stream("Listado.pdf");
echo $dompdf->output();
?>

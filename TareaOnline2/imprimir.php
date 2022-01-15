<?php
include_once "./dompdf_1-1-1/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options-> set('isRemoteEnabled', true);
// $options-> set('chroot', realpath(''));
$dompdf = new Dompdf($options);
ob_start();
include "listadoImprimir.php";
$html = ob_get_clean() ;
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("Listado.pdf");
echo $dompdf->output();
?>

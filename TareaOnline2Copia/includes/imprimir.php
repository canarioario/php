<?php
require_once 'config.php';
require_once '/dompdf_1-1-1/dompdf/autoload.inc.php';  
use Dompdf\Dompdf; //para incluir el namespace de la librería    
$dompdf = new DOMPDF();
$dompdf->set_paper("A4");
ob_start();
include 'mi_template_html_de_pdf.php';
$html_para_pdf = ob_get_clean();
$dompdf->load_html($html_para_pdf);
$dompdf->render(); //este comando renderiza el PDF
$output = $dompdf->output(); //extrae el contenido renderizado del PDF
file_put_contents('mipdf.pdf', $output); //guarda el PDF en un fichero llamado mipdf.pdf ?>

<?php
/*
Crear un array llamado meses y que almacene el nombre de los doce meses del año. 
Recorrerlo con FOR para mostrar por pantalla los doce nombres.
*/

echo "-------------------------------INICIO-----------------------------------------------"."<br/>";
$meses = array( 'enero',
                'febrero',
                'marzo',
                'abril',
                'mayo',
                'junio',
                'julio',
                'agosto',
                'septiembre',
                'octubre',
                'noviembre',
                'diciembre');


for ($i=0; $i < count($meses); $i++) {
    echo " $meses[$i]<br/>";
}
echo "<br />-------------------------------FIN-----------------------------------------------";




?>
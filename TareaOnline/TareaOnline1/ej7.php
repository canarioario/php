<?php

/*
Ejercicio 7. Igual que el anterior pero utilizando el foreach.
*/
echo "-------------------------------INICIO-----------------------------------------------"."<br/>";
 $meses = array('enero',
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

foreach ($meses as $mes) {
    echo " $mes<br/>";
}
echo "<br />-------------------------------FIN-----------------------------------------------";
?>
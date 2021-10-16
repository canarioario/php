<?php
/*
Ejercicio 24.
 Modifique el ejercicio anterior para pasarle un parámetro opcional que nos permita imprimir directamente la tabla en una tabla HTML striped.
*/

function tabla($numero, $html = null) {
    $tabla ="";

    if ($html != null) {
      

        }
    for ($i=1; $i <=10; $i++) {
        $cuenta = $i*$numero;
        $tabla .= "{$i} x {$numero} = {$cuenta} <br/>";          
    
    }

    if ($html != null) {
        echo "<h3>Tablas de multplicar {$numero} </h3>";
 
    echo  // imprimir en una tabla
    "<table border=1> 
    <tr>
            <th>Tabla del {$numero}</th>
    </tr>
    <tr>
            <th>$tabla</th>
    </tr>  
     </table>"; 
    }
return $tabla;
}
echo "<h1>Tablas de multplicar</h1>";
// $num = 5;
// echo tabla($num) // para mostrar la tabla de 5;

 for ($i=1; $i <=10 ; $i++) {      // bucle para mostrar las tablas del 1 al 10
    //echo "<h3>Tablas de multplicar</h3>";
     tabla ($i, true);
 }



?>

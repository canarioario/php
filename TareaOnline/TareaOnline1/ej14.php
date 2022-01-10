<?php
/*
Ejercicio 14. Escribe un programa que añada valores a un array mientras que su
longitud sea menor a 100 y después que se muestre la información del array por
pantalla.
*/


$numeros = array ();

for ($i=0; $i < 100 ; $i++) { 

   // otra opcion es asi:  array_push($numeros,$i);
    $numeros["numero-{$i}"] = $i;
    
}
var_dump($numeros);

?>
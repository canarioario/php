<?php
/*
Ejercicio 23. Implemente a una función a la que le pases un número y muestre por pantalla su tabla de multiplicar.
*/



function tabla($numero) {
    $tabla ="";
    for ($i=1; $i <=10; $i++) {
        $cuenta = $i*$numero;
        $tabla .= "{$i} x {$numero} = {$cuenta} <br/>";          
    }
return $tabla;
}
echo "<h1>Tablas de multplicar</h1>";
// $num = 5;
// echo tabla($num) // para mostrar la tabla de 5;

 for ($i=1; $i <=10 ; $i++) {      // bucle para mostrar las tablas del 1 al 10
    echo "<h3>Tablas de multplicar</h3>";
    echo tabla ($i);
 }
?>
<?php
/*
Ejercicio 8. Escriba un programa que calcule la factorial de un número que se le pase en un parámetro GET por la URL.
El factorial de un número entero N es una operación matemática que consiste en multiplicar todos los factores N x (N-1) x (N-2) x ... x 1.
Así, la factorial de 5 escrito como 5 es igual a: 5! = 5 x 4 x 3 x 2 x 1 = 120

*/

$factorial=1 ;
$numero = $_GET["numero"];

for ($i=1; $i <= $numero; $i++) { 
     $factorial =   $factorial * $i;
  //  $factorial *= $i;
  
}
echo "El factorial de ". $numero . " es ". $factorial ;
    
?>
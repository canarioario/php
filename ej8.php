<?php
/*
Ejercicio 8. Escriba un programa que calcule la factorial de un número que se le pase en un parámetro GET por la URL.
El factorial de un número entero N es una operación matemática que consiste en multiplicar todos los factores N x (N-1) x (N-2) x ... x 1.
Así, la factorial de 5 escrito como 5 es igual a: 5! = 5 x 4 x 3 x 2 x 1 = 120

*/

if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {
    $numero = $_GET["numero"];
} else {
    $numero =5; 
    echo "numero por defecto 5 "."<br/>";
}


for ($i=$numero; $i >= 0; $i--) { 
    $fact = ($numero - 1);
    $factorial = ($fact * $i); 
    echo $factorial ;
    

}

?>
<?php
/*
Ejercicio 19. Escriba un programa que calcule la factorial de un número que se le pase mediante un parámetro POST enviado desde un formulario
*/

$factorial=1 ;
$numero = $_POST["numero"];

for ($i=1; $i <= $numero; $i++) { 
   //  $factorial =   $factorial * $i;
    $factorial *= $i;
  
}
echo "El factorial de ". $numero . " es ". $factorial ;
    
?>
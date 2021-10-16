<meta charset= "utf-8">
<?php
/*
Ejercicio 4. Escribe un programa que multiplique los 20 primeros números naturales.*/
$contador =2;
$numero = 1;
while ($contador <= 20) {
    $numero *= $contador;
    echo $numero . "<br/>"; // para ver como se va multplicando 
    $contador++;
}
   
echo "El resultado de multiplicar los 20 primero numeros es: " . $numero;

?>

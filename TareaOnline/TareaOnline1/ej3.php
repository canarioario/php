<?php
// Ejercicio 3. Modifica el ejercicio anterior para que muestre al lado de cada cuadrado si es un número par o impar.
echo "-------------------------------INICIO-----------------------------------------------";

for ($a = 1; $a<=30; $a++) {

   
    if ($a%2==0){
       
    
    echo "<br />El cuadrado de ". $a . " es ".  ($a * $a) . " y es par "; //  imprimir por pantalla los cuadrados


}else{
 
 echo "<br /> El cuadrado de ". $a . " es ".  ($a * $a) . " y es impar "; //  imprimir por pantalla los cuadrados

}

}
echo "<br />-------------------------------FIN-----------------------------------------------";
?>
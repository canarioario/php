<?php
/*
Ejercicio 17. Crea un script PHP que tenga tres variables, una tipo array, otra tipo
string y otra boleana y que imprima un mensaje según el tipo de variable que sea.
*/
$array1 = array("hola", 2 );
$texto = "Soy string";
$bol = true;

if (is_array($array1)) {
    echo "El array es un array"; 
}

if (is_bool($bol)) {
    echo "<br/>El booleano es un booleano"; 
}
if (is_string($texto)) {
    echo "<br/>El string es un string";
}

?>
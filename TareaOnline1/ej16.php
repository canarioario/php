<?php
/*
Ejercicio 16. Escribe un programa que compruebe si una variable esta vacía y si
está vacía, rellenarla con texto en minúsculas y mostrarlo convertido a mayúsculas
en negrita.
*/

$texto ="";
if (empty ($texto)) {
    $texto = strtoupper ("texto de relleno");
    echo "<strong>{$texto}</strong>";
} else {

    echo " esta rellena";
}

?>
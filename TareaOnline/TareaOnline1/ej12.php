<?php
/*
Ejercicio 12. Hacer un programa que tenga un array de 5 números enteros y hacer
lo siguiente con él:
1. Recorrerlo y mostrarlo.
2. Ordenarlo y mostrarlo.
3. Mostrará su longitud.
4. Buscar en el vector.
*/
$numeros = array('80','20','40','10','50' );
echo "<h2>Recorrer y mostrar</h2>";
foreach ($numeros as $num){
    echo $num."<br/>";
}
echo "<h2>Recorrerlo y mostrarlo</h2>";
sort($numeros); //sort para ordenar
foreach ($numeros as $num){
    echo $num."<br/>";
}

echo "<h2>Mostrara su longitud</h2>" .count($numeros); // o .sizeof
count($numeros);
echo "<h2>Buscar en el vector</h2>";
if (!array_search(50,$numeros)) { 
    echo "El numero no exite en el array";
}else {

    echo "el numero si exite" ;
}

?>
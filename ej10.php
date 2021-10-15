<?php
/*
Ejercicio 10. Mostrar los números múltiplos de un número pasado por la URL que
hay del 1 al 100.
*/
echo "-------------------------------INICIO-----------------------------------------------";


for ($i=1; $i <=  100; $i++) { 
   
if( isset($_GET["numero"]) && $i%$_GET["numero"] == 0){

	echo " <br />"  . $i . " es multiplo de " .$_GET["numero"];
   }
}
echo "<br />-------------------------------FIN-----------------------------------------------";


// añadir codigo del video

?>


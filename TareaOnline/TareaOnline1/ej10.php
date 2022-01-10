<!DOCTYPE html>
<html>
   <head>
      <title>Ejercicio 10</title>
   </head>
   <body>
      <?php  /* la siguiente linea es para comprobar que el parametro introducio por la url es un numero es un numero */?>
      <?php if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {?> 
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
         }  else {
            echo "Introduzca un numero correcto por la url.";
            
             }
         echo "<br />-------------------------------FIN-----------------------------------------------";
         ?>
   </body>
</html>

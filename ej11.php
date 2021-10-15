<!DOCTYPE html>
<html>
   <head>
      <title>Ejercicio 11</title>
   </head>
   <body>
      <?php /* la siguiente linea es para comprobar que el parametro introducio por la url es un numero es un numero */ ?>
      <?php if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) { ?> 
      <?php
    /*
        Ejercicio 11. Un número es bueno si y solo si la suma de sus divisores sin contarse
        el mismo da ese número. Programa que calcule si un número es bueno o no.
    */

    echo "-------------------------------INICIO-----------------------------------------------";
    $suma = 0;
    for ($i = 1;$i < $_GET["numero"];$i++)
    { // i son los divisores. Se divide desde 1 hasta
        if ($_GET["numero"] % $i == 0)
        {
            $suma += $i; // si es divisor se suma
            
            if ($suma == $_GET["numero"])
            {
                echo "<br>" . $_GET["numero"] . " es un numero bueno";
            }
      
        }
        
        
    }

}
echo "<br />-------------------------------FIN-----------------------------------------------";
?>
   </body>
</html>

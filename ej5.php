
<?php
/*
Imprimir por pantalla la tabla de multiplicar del número pasado en un parámetro GET por la URL.
*/
$numero =$_REQUEST['numero'];

for ($i=1; $i <11; $i++) { 
    
     
    echo $numero. " x ". $i.  " = ".($numero * $i)."<br/>";
    

}

?>




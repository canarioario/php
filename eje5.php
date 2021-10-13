<?php


if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {
    $numero = $_GET["numero"];
} else {
    $numero =5; 
    echo "numero por defecto"."<br/>";
}


for ($i=1; $i <11; $i++) { 
    
     
    echo $numero. " x ". $i.  " = ".($numero * $i)."<br/>";
    

}

?>
<?php
/*
Ejercicio 13. Escribe un programa que muestre la dirección IP del usuario que
visita nuestra web y si usa Firefox darle la enhorabuena.
*/

$ip = $_SERVER["REMOTE_ADDR"]; 
$browser =$_SERVER["HTTP_USER_AGENT"];

echo "Tu ip es " . $ip;

if(strstr($browser,"Firefox") == true){

   echo "<br/>El navegador que usas es Firefox Enorabuena";

} else {
    echo "<br/>no usas firefox";
}


?>
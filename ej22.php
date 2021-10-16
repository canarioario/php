<?php
/*
Ejercicio 22. Implemente la función filter_var para comprobar si el email que nos llega por la URL es un email valido.
*/


function validateEmail($email){

if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) { //comprueba que no viene vacio y que es un email
   $status = "VALIDO";
  } else {
    $status = "NO VALIDO";
  }   
return $status; // devolvemos el status
}
$email= "";

if (isset($_GET["email"])) { // comprueba si existe $email
   $email = $_GET["email"];
}
echo validateEmail($email);
?>

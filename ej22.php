<?php
/*
Ejercicio 22. Implemente la función filter_var para comprobar si el email que nos llega por la URL es un email valido.
*/

$email= $_GET[""];


if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email es un correo electronico valido");
  } else {
    echo("$email no es correo electronico valido");
  }   

?>

<?php
/*
Ejercicio 26. Implemente un script que recoja los datos de las variables POST del formulario anterior y los muestre por pantalla, 
en el caso de que existan y tengan un valor asociado, o un mensaje 'No definido :
(' indicando que están vacíos.
*/

if (isset($_POST["submit"])) {
   if (!empty($_POST["nombre"])) {
      echo $_POST["nombre"]."<br/>";
   }
   if (!empty($_POST["apellidos"])) {
    echo $_POST["apellidos"]."<br/>";
 }
 if (!empty($_POST["bio"])) {
    echo $_POST["bio"]."<br/>";
 }
 if (!empty($_POST["email"])) {
    echo $_POST["email"]."<br/>";
 }
 if (!empty($_POST["image"])) {
    echo $_POST["image"]."<br/>";
 }
 if (!empty($_POST["password"])) {
    echo $_POST["password"]."<br/>";
 }
    
}










?>
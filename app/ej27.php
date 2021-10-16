<?php
/*
Ejercicio 27. Valide el formulario anterior considerando las siguientes reglas:
- Nombre: Solo puede estar formado por letras y tener una longitud máxima de 20 caracteres.
- Apellidos: Solo puede estar formado por letras.
- Biografía: No puede estar vacío.
- Email: tiene que ser un email válido.
- Contraseña: Debe tener una longitud mayor que 6 caracteres.
- Imagen: Puede estar vacía.
         Consideraciones:
•	Deberá validar y sanitizar todos los campos.
•	Deberá mostrar los errores de validación junto a los campos correspondientes en los que se produzcan.
•	Si se produce algún error de validación, se deberán mantener los valores anteriormente introducidos en los distintos campos. 

*/

if (isset($_POST["submit"])) {
    if (!empty($_POST["nombre"]) && strlen($_POST["nombre"]) <= 20
     && !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["nombre"])) { // strlen para comprobar que no es mayor a 20 !is_numeric para comporbar que no 
       echo $_POST["nombre"]."<br/>";                                                // es numerico y con !preg_match para comprobar que no tiene ningun caracter de 0-9
    }else {
       echo "Rellene el nombre"."<br/>";
    }
    if (!empty($_POST["apellidos"])  && !is_numeric($_POST["apellidos"]) && !preg_match("/[0-9]/", $_POST["apellidos"])) { // comprueba que no es numerico 
     echo $_POST["apellidos"]."<br/>";
  }else {
    echo "Rellene los apellidos"."<br/>";
 }
  if (!empty($_POST["bio"])) {
     echo $_POST["bio"]."<br/>";
  }else{
      echo "Rellene la biografia"."<br/>";
  }
 
  if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { // validar correo 
     echo $_POST["email"]."<br/>";
  }else {
    echo "Rellene el email"."<br/>";
 }
  if (!empty($_POST["image"])) {
     echo $_POST["image"]."<br/>";
  }
  if (!empty($_POST["password"])&& strlen($_POST["password"]) >= 6) { // comprueba longuitud
     echo sha1 ($_POST["password"])."<br/>"; // encripta la contraseña
  }else {
    echo "Rellene la password"."<br/>";
 }
 
     if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) { // para comprobar que la imagen a llegado
         echo"la imagen nos a llegado"; 
     }
 } 

?>
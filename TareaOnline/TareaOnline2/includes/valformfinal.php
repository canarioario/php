<?php

/**
 * Script que muestra en una tabla los valores enviados por el usuario a través 
 * del formulario utilizando el método POST
 */
// Definimos e inicializamos el array de errores y las variables asociadas a cada campo
$errors    = [];
$nombre    = "";
$apellidos = "";
$mibiograf = "";
$correo    = "";
$password  = "";
$perfil    = "";

// Función que muestra el mensaje de error bajo el campo que no ha superado
// el proceso de validación
function mostrar_error($errors, $campo) {
  $alert = "";
  if (isset($errors[$campo]) && (!empty($campo))) {
    $alert = '<div class="alert alert-danger" style="margin-top:5px;">' . $errors[$campo] . '</div>';
  }
  return $alert;
}

// Verificamos si todos los campos han sido validados
function validez($errors) {
  if (isset($_POST["submit"]) && (count($errors) == 0)) {
    return '<div class="alert alert-success" style="margin-top:5px;"> Formulario validado correctamente!! :)</div>';
  }
}

// Visualización de las variables obtenidas mediante el formulario
function valoresfrm() {
  global $nombre,$apellidos,$mibiograf,$correo,$password;
  echo  "<table id= tabla; class=table table-striped;>";
  echo "<thead>";
  echo "<tr><h4>Valores obtenidos mediante el formulario</h4></tr>";
  echo "</thead>";
  echo "<tbody>";
  echo "<th><td><strong>Nombre: </th></strong>" . $nombre . "</td>";
  echo "<th><td><strong>Apellidos: </th></strong>" . $apellidos . "</td>";
  echo "<th><td><strong>Biografía: </th></strong>" . $mibiograf . "</td>";
  echo "<th><td><strong>Email: </th></strong>" . $correo . "</td>";
  echo "<th><td><strong>Contraseña: </th></strong>" . $password . "</td>";
  if (!empty($_FILES["image"]["tmp_name"])) {
    echo "<th><td><strong>Fotografía: </th></strong>" . $_FILES["image"]["tmp_name"] . "</td>";
  }else{
    echo "<th><td><strong>Fotografía: </th></strong>" . "Sin fotografia". "</td>";
  }
  echo "</tbody>";
  echo "</table>";
}

if (isset($_POST["submit"])) {

  if (!empty($_POST["name"]) && (!preg_match("/[0-9]/", $_POST["name"])) && (strlen($_POST["name"]) < 20)) {
    $nombre = trim($_POST["name"]);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  } else {
    $errors["name"] = "El nombre introducido no es válido :(";
  }

  if (!empty($_POST["surname"]) && (!preg_match("/[0-9]/", $_POST["surname"])) && (strlen($_POST["surname"]) < 20)) {
    $apellidos = trim($_POST["surname"]);
    $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
  } else {
    $errors["surname"] = "Los apellidos introducidos no son válidos :(";
  }

  if (!empty($_POST["bio"])) {
    $mibiograf = $_POST["bio"];
    $mibiograf = trim($mibiograf); // Eliminamos espacios en blanco
    $mibiograf = htmlspecialchars($mibiograf); //Caracteres especiales a HTML
    $mibiograf = stripslashes($mibiograf); //Elimina barras invertidas
  } else {
    $errors["bio"] = "La biografía no puede esta vacía :(";
  }

  if (!empty($_POST["email"])) {
    $correo = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "La dirección email introducida no es válida :(";
    }
  }

  if (!empty($_POST["password"]) && (strlen($_POST["password"]) > 6) && (strlen($_POST["password"]) <= 10)) {
    $password = sha1($_POST["password"]);
  } else {
    $errors["password"] = "Introduzca una contraseña válida (6-10 caracteres) :(";
  }

  if (!isset($_FILES["image"]["tmp_name"])&& !empty($_FILES["image"]["tmp_name"])) {
    $errors["image"] = "Seleccione una imagen válida :(";
  }
}
?>

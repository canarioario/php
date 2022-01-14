<?php
require_once 'includes/config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
   $msgresultado ="";
// Array asociativo que almacenará los mensajes de error que se generen por cada campo
   $errors= [];
   $nombre    = "";
   $password  = "";
   $email    = "";
   $imagen = null;
// Función que muestra el mensaje de error bajo el campo que no ha superado
// el proceso de validación
function mostrar_error($errors, $campo) {
  $alert = "";
  if (isset($errors[$campo]) && (!empty($campo))) {
    $alert = '<div class="alert alert-danger" style="margin-top:5px;">' . $errors[$campo] . '</div>';
  }else {
      $alert ='';
  
    }
  return $alert;
}
// Verificamos si todos los campos han sido validados
function validez($errors) {
  if (isset($_POST["submit"]) && (count($errors) == 0)) {
    return '<div class="alert alert-success" style="margin-top:5px;"> Formulario validado correctamente!! :)</div>';
  }
}
// Si se ha pulsado el botón guardar...
if(isset($_POST['submit'])){ // y hermos recibido las variables del formulario y éstas no están vacías...
  if (!empty($_POST["name"]) && (!preg_match("/[0-9]/", $_POST["name"])) && (strlen($_POST["name"]) < 20)) {
    $nombre = $_POST["name"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $name_validate = true;
  } else {
    $errors["name"] = "El nombre introducido no es válido :(";
    $name_validate = false;
  }
  if (!empty($_POST["email"])) {
    $email_validate = true;
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_validate = false;
      $errors["email"] = "La dirección email introducida no es válida :(";
    }
  }
  if (!empty($_POST["password"]) && (strlen($_POST["password"]) > 6) && (strlen($_POST["password"]) <= 10)) {
    $password = sha1($_POST["password"]);
    $pass_validate = true;
  } else {
    $pass_validate = false;
    $errors["password"] = "Introduzca una contraseña válida (6-10 caracteres) :(";
  }
    /* Realizamos la carga de la imagen en el servidor */
    // Hacemos un var_dump ara comprobar la estructura de la variable $_FILES["imagen"]
    //var_dump($_FILES["imagen"]);
    // Comprobamos que el campo tmp_name tiene un valor asignado para asegurar que hemos
    //recibido la imagen correctamente
    // Definimos la variable $imagen que almacenará el nombre de imagen 
    // que almacenará la Base de Datos inicializada a NULL
    if(isset($_FILES["imagen"]["tmp_name"])){
    // Verificamos la carga de la imagen
    // var_dump($_FILES["imagen"]);
    // die();
    // Comprobamos si existe el directorio fotos, y si no, lo creamos
       if(!is_dir("fotos"))
         { $dir = mkdir("fotos", 0777, true);  }
        else{ $dir = true; }
    // Ya verificado que la carpeta uploads existe movemos el fichero seleccionado a dicha carpeta
       if($dir){
          //Para asegurarnos que el nombre va a ser único...
          $nombrefichimg = time() . "-" . $_FILES["imagen"]["name"];
          // Movemos el fichero de la carpeta temportal a la nuestra
          $movfichimg    = move_uploaded_file($_FILES["imagen"]["tmp_name"],"fotos/".$nombrefichimg);
          $imagen = $nombrefichimg;
          // Verficamos que la carga se ha realizado correctamente
          if($movfichimg){
                  $imagencargada = true;
          }  else {
                  $imagencargada = false;
                  $imagen = "no imagen";
          }
        }
    }   
    // insertar en la base de datos
    if(count($errors)==0){
      try{  //Definimos la instrucción SQL parametrizada 
          $sql = "INSERT INTO usuarios(nombre,password,email,imagen)
                         VALUES (:nombre,:password,:email,:imagen)";
          // Preparamos la consulta...
          $query = $conexion->prepare($sql); 
          // y la ejecutamos indicando los valores que tendría cada parámetro
          $query->execute ([
              'nombre'   => $nombre,
              'password' => $password,
              'email'    => $email,
              'imagen'   => $imagen
          ]); //Supervisamos si la inserción se realizó correctamente... 
          if($query){
            $insert = true;
            $msgresultado = '<div class="alert alert-success" style="margin-top:5px;"> El usuarios se registró correctamente!! :)</div>';
          }// o no :(
        }catch (PDOException $ex){
          $insert = false;
            $msgresultado = '<div class="alert alert-danger" style="margin-top:5px;"> El usuarios no pudo registrarse. </div>';
            //die();
        }
    }else{
      $msgresultado =   '<div class="alert alert-danger" style="margin-top:5px;">Datos de registro de usuario erróneos!! :(  </div>';
      //die();
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Alta Usuario</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--    Referencia a la CDN de la hoja de estilos de Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="cuerpo">
    <div class="centrar">	
   <div class="container centrar">
   <?php echo $msgresultado;  ?> 
     <a href="user.php">Inicio</a>&nbsp&nbsp&nbsp&nbsp&nbsp
     <a href="listado.php">Listado</a>
     <div class="container cuerpo text-center centrar">	 
       <p><h2><img class="alineadoTextoImagen" src="./images/user.png" width="50px"/>Añadir Usuario</h2> </p>
     </div>
     <?php echo validez($errors); ?>
    <?php if (isset($_POST["submit"]) && (count($errors) == 0)) {} ?>
     <form action="user.php" method="post" enctype="multipart/form-data">
       <label for="name">Nombre:
       <input type="text" class="form-control" name="name" required <?php if(isset($_POST["name"])){echo "value='{$_POST["name"]}'";} ?>>
      <?php echo  mostrar_error($errors, "name")?>
      </label>
       <br/>
       <label for="email">Email:
         <input type="email" class="form-control" name="email" <?php if(isset($_POST["email"])){echo "value='{$_POST["email"]}'";} ?>>
         <?php echo  mostrar_error($errors, "email")?>
        </label>
       <br/>
       <label for="password">Contraseña:
       <input type="password" class="form-control" name="password" required  <?php if(isset($_POST["password"])){echo "value='{$_POST["password"]}'";} ?>>
       <?php echo  mostrar_error($errors, "password")?>
      </label>
       <br/>
       <label for="imagen"> Imagen: <input type="file" name="imagen" class="form-control" />
      </label>
       </br>
       <input type="submit" value="Guardar" name="submit" class="btn btn-primary">
     </form>
   </div>
  </body>
</html>
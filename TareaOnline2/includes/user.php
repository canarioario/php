<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
$msgresultado ="";
if (isset($_POST["submit"])) {

  if (!empty($_POST["name"]) && (!preg_match("/[0-9]/", $_POST["name"])) && (strlen($_POST["name"]) < 20)) {
    $nombre = trim($_POST["name"]);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  } else {
    $errors["name"] = "El nombre introducido no es válido :(";
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

    $nombre = $_POST['name'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    try{  //Definimos la instrucción SQL parametrizada 
        $sql = "INSERT INTO usuarios(nombre,password,email)
                       VALUES (:nombre,:password,:email)";
        // Preparamos la consulta...
        $query = $conexion->prepare($sql); 
        // y la ejecutamos indicando los valores que tendría cada parámetro
        $query->execute ([
            'nombre'   => $nombre,
            'password' => $password,
            'email'    => $email
        ]); //Supervisamos si la inserción se realizó correctamente... 
        if($query){
          $msgresultado = '<div class="alert alert-success">' . "El usuarios se registró correctamente!! :)" . '</div>';
        }// o no :(
      }catch (PDOException $ex){
          $msgresultado = '<div class="alert alert-success">' . "El usuario no pudo registrarse!! :(" . '</div>';
          die();
      }
   }
  
?>
  <body class="cuerpo">
   <div class="container centrar">
     <a href="addUser.php">Inicio</a>
     <div class="container cuerpo text-center centrar">	
       <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Añadir Usuario</h2> </p>
     </div>
     <?php echo $msgresultado;  ?> 
     <form action="addUser.php" method="post">
     <label for="name">Nombre:
        <input type="text" name="name" class="form-control" <?php if(isset($_POST["name"])){echo "value='{$_POST["name"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "name"); ?>    
      </label>
      <br/>
      <label for="email">Correo:
        <input type="email" name="email" class="form-control" <?php if(isset($_POST["email"])){echo "value='{$_POST["email"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "email"); ?>                      
      </label>
      <br/>
      <label for="password">Contraseña:
        <input type="password" name="password" class="form-control" <?php if(isset($_POST["password"])){echo "value='{$_POST["password"]}'";} ?> />
        <?php echo mostrar_error($errors, "password"); ?>                       
      </label>
       <br/>
       <input type="submit" value="Guardar" name="submit" class="btn btn-success">
     </form>
   </div>
  </body>

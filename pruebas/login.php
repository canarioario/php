<?php
  if(isset($_POST['submit']))
    { // Comprobamos que recibimos los datos y que no están vacíos
      $email = trim($_POST['email']);
      $password = sha1($_POST['password']);
      if((isset($_POST['email'])&& isset($_POST['password'])) 
        && (!empty($_POST['email'])&& !empty($_POST['password']))){
         if ($_POST['email'] == $email && $_POST['password'] == $password) {
            session_start();
            $_SESSION['logueado']=$_POST['email'];
            $_SESSION['email']= $_POST['email'];
            //Creamos un par de cookies para recordar el user/pass. Tcaducidad=15días
            if(isset($_POST['recuerdo'])&&($_POST['recuerdo']=="on")) // Si está seleccioniado el checkbox...
             { // Creamos las cookies para ambas variables 
               setcookie ('email' ,$_POST['email'] ,time() + (15 * 24 * 60 * 60)); 
               setcookie ('password',$_POST['password'],time() + (15 * 24 * 60 * 60));
               setcookie ('recuerdo',$_POST['recuerdo'],time() + (15 * 24 * 60 * 60));
              } else {  //Si no está seleccionado el checkbox..
                // Eliminamos las cookies
                if(isset($_COOKIE['email'])) { 
                   setcookie ('email',""); } 
                if(isset($_COOKIE['password'])) { 
                   setcookie ('password',""); } 
                if(isset($_COOKIE['recuerdo'])) { 
                   setcookie ('recuerdo',""); }    
             }
             // Lógica asociada a mantener la sesión abierta 
             if(isset($_POST['abierta'])&&($_POST['abierta']=="on")) // Si está seleccionado el checkbox...
             { // Creamos una cookie para la sesión 
               setcookie ('abierta' ,$_POST['email'],time() + (15 * 24 * 60 * 60)); 
              } else {  //Si no está seleccionado el checkbox..
                // Eliminamos la cookie
                if(isset($_COOKIE['abierta'])) { 
                   setcookie ('abierta',""); } 
             }
          // Redirigimos a la página de inicio de nuestro sitio  
             header ("Location: user.php");
      }else{
       header ("Location: login.php");
      }  
     }
    }   
?>
<!DOCTYPE html>
<html>
  <head>
 <?php require_once 'includes/header.php'; ?>
  </head>
  <body class="cuerpo">
    <div class="centrar">	
   <div class="container centrar">
     <div class="container cuerpo text-center centrar">	 
     <p><h2><img class="alineadoTextoImagen" src="./images/user.png" width="50px"/>Login de email:</h2> </p>
     <div class="container">
    <form  action="login.php" method="POST">
      <label for="name">Email:
        <input type="text" name="email" class="form-control" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" /> 
      </label>
      <br/>
      <label for="password">Contraseña:
        <input type="password" name="password" class="form-control" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>"/>            
      </label>
      <br/>
      <label><input type="checkbox" name="recuerdo" <?php if(isset($_COOKIE['recuerdo'])){echo " checked";} ?> >Recuérdeme :)</label>
      <br/>     
      <label><input type="checkbox" name="abierta" <?php if(isset($_COOKIE['abierta'])){echo " checked";} ?> >Mantener la sesión abierta.</label>
      <br/>     

      <?php
        if(isset($_GET['error'])){
           if ($_GET['error'] == "datos") {
               echo '<div class="alert alert-danger" style="margin-top:5px;">' . "Tu email o/y tu contraseña no son correctos, inténtelo de nuevo!! :( <br/>" . '</div>';
             }
          elseif ($_GET['error'] == "fuera") {
               echo '<div class="alert alert-danger" style="margin-top:5px;">' . "No puede acceder  directamente en esta página, ha de loguearse!! :O <br/>" . '</div>';          
             }
        }     
      ?>      
      <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
    </form>
  </div>
  </body>
  <footer>
  <?php require_once 'includes/footer.php'; ?>
  </footer>
</html>
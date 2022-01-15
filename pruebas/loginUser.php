<?php
require_once 'includes/config.php';

if(isset($_POST['submit'])){ // Comprobamos que recibimos los datos y que no están vacíos
    $email = trim($_POST['email']);
    $password = sha1($_POST['password']);
  if((isset($_POST['email'])&& isset($_POST['email'])) 
    && (!empty($_POST['password'])&& !empty($_POST['password']))){
     if ($_POST['email'] == $email && $_POST['password'] ==  $password ) {
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
        header ("Location: login.php?error=datos");
      
      }  
     }
    }   
?>
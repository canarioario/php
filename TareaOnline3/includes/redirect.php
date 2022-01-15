<?php
  session_start();   //Activamos el uso de sesiones
if (!isset($_SESSION["logueado"])) {
    header("Location: login.php");
}
?>
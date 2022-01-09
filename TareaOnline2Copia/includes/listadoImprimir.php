<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no

// Generamos el listado de los usuarios...
 try{  //Definimos la instrucción SQL parametrizada 
    $sql = "SELECT * FROM usuarios";
    // Hacemos directamente la consulta al no tener parámetros
    $resultsquery = $conexion->query($sql);
    //Supervisamos si la inserción se realizó correctamente... 
  }catch (PDOException $ex){
     
      die();
  }
?>
<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Listado Imprimir</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--    Referencia a la CDN de la hoja de estilos de Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="cuerpo">
      <h3 style="text-align:center;">LISTADO PARA IMPRIMIR</h3>
     <?php   ?> 
     <table class="table table-striped" >
       <tr>
         <th>Nombre</th>
<!--         <th>Contraseña</th>-->
         <th>Email</th>
         <!-- Añadimos una columna para las operaciones que podremos realizar con cada registro -->
         <th>Imagen</th>
       </tr>
       <?php
        while($fila = $resultsquery->fetch(PDO::FETCH_ASSOC)){
              echo '<tr>';
              echo '<td>' . $fila['nombre']   . '</td>' ;
//              echo '<td>' . $fila['password'] . '</td>' ;
              echo '<td>' . $fila['email']    . '</td>' ;
               if (!empty($fila['imagen'])) {
                echo '<td>' . '<img src="/TareaOnline2Copia/includes/fotos/' . $fila['imagen'] . '" width="40" /> ' . $fila['imagen'] . '</td>';
              }else{
                echo '<td>' . "-------------" . '</td>';
              }
              echo '</tr>';
        }
       ?>
     </table>
  </body>
<?php
require_once 'includes/config.php';
//var_dump($_POST);
// Obtenemos el id del usuario a borrar desde el listado
$id = $_GET['id'];
if(isset($_GET['id'])&& (is_numeric($_GET['id'])))
{
   try{  //Definimos la instrucción SQL parametrizada 
      $sql = "DELETE FROM usuarios WHERE id=:id";
      $query = $conexion->prepare($sql);
      $query->execute([ 'id' => $id ]);
      //Supervisamos si la inserción se realizó correctamente... 
      if($query){
        // echo '<div class="alert alert-success" style="margin-top:5px;">La eliminación del usuario se realizó correctamente!! </div>';
         header("Location:listado.php");
      }// o no :(
    }catch (PDOException $ex){
        echo '<div class="alert alert-success" style="margin-top:5px;">La eliminación del usuario se realizó correctamente!! </div>';
        
        die();
    }
} else {
         echo '<div class="alert alert-success">No se pudo acceder al id del usuario a eliminar!! :( </div>';
} 
?>
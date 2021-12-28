<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=bdusuarios', 'root', ''); // conexion a la bd
    $mensaje = "<div class='alert alert-success'> Conectado a la Base de datos Usuario!! :) </div>"; // alerta success 
    echo $mensaje; // muestra mensaje
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>
    No se puede conectar a la Base de datos Usuario!! :(
  </div>"; // muestra alerta danger si la conexion no a sido correcta
    die();
}
?>
<div class="encabezado text-center">	
  <h1><img class="alineadoTextoImagen" src="images//bombilla.png" /> Práctica#2: DAWES </h1>
</div>   
</div>
     <ul>
       <li> <a href="addUser.php"> Inicio</a></li>
     </ul>
   </div> 
<div class="centrar">	
  <div class="container cuerpo text-center">	
    <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/> Datos de usuario:</h2></p>
    <?php echo validez($errors); ?>
    <?php if (isset($_POST["submit"]) && (count($errors) == 0)) { valoresfrm(); } ?>
  </div>
  <div class="container">
    <form  action="addUser.php" method="POST" enctype="multipart/form-data">
      <label for="name">Nombre:
        <input type="text" name="name" class="form-control" <?php if(isset($_POST["name"])){echo "value='{$_POST["name"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "name"); ?>    
      </label>
      <br/>
      <label for="surname"> Apellidos:
        <input type="text" name="surname" class="form-control" <?php if(isset($_POST["surname"])){echo "value='{$_POST["surname"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "surname"); ?>  
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
      <br/>           
      <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
    </form>
  </div>
</div>  
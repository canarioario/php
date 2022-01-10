
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Conexion BD PDO PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link href="css/misestilos.css" rel="stylesheet"> 
  </head>
  <body class="cuerpo">
  <?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=bdusuarios', 'root', ''); // conexion a la bd
    $mensaje = "<div class='alert alert-success'> Conectado a la Base de datos Usuario!! :) </div>"; // alerta success 
    echo $mensaje; // muestra mensaje
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>
    No se puede conectar a la Base de datos Usuario!! :(
  </div>"; // muestra alerta danger si la conexion no a sido correcta
    die();
}
?>
  </body>
</html>

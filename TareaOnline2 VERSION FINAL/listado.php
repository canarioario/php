<?php
require_once 'includes/config.php';
require_once 'includes/paginador.php';

if($registros){
  $msgresultado = '<div class="alert alert-success" style="margin-top:5px;"> El listado se realizó correctamente!! :)</div>';
  
}else{
  $msgresultado = '<div class="alert alert-success">' . "El listado no pudo realizarse correctamente!! :( <br/>(" .$ex->getMessage(). ')</div>';
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Listado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/misestilos.css" rel="stylesheet">
  </head>
  <body>
  <div class="centrar">	
   <div class="container centrar">
   <?php echo $msgresultado;  ?> 
     <a href="user.php">Inicio</a>&nbsp&nbsp&nbsp&nbsp&nbsp
     <a href="listado.php">Listado</a>
     <div class="container cuerpo text-center centrar">	 
       <p><h2><svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-journal-bookmark-fill-center" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>Listado</h2> </p>
     </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <div class="page-header">
          </div>  
          
          <div class="btn-group open">
            <a class="btn btn-primary" href="#"><i class="icon-user"></i> Mostrar:</a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
             </span></a>
            <ul class="dropdown-menu">
              <li><a href="listado.php?regsxpag=2"> <i class="icon-fixed-width icon-th"></i> 2</a></li>
              <li><a href="listado.php?regsxpag=4"> <i class="icon-fixed-width icon-th"> </i> 4</a></li>
              <li><a href="listado.php?regsxpag=8"> <i class="icon-fixed-width icon-th"></i> 8</a></li>
              <li><a href="listado.php?regsxpag=10"><i class="icon-fixed-width icon-th"></i> 10</a></li>
            </ul>
          </div>
          <a href="imprimir.php"  type="submit" value="Imprimir" name="submit" class="btn btn-primary">Imprimir</a>
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Imagen</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>
              <?php //Verificamos que existen registros a mostrar
                if($totalregistros>=1):  
                  foreach($registros as $reg ): 
              ?>
              <tr>
                <td> <?php echo $reg['nombre']?> </td>
                <td> <?php echo $reg['email']?>    </td>
                <td> <?php  if ($reg["imagen"] != "no imagen"){
                echo  '<img src="./fotos/' . $reg['imagen'] . '" width="40" /> ' . $reg['imagen'];
              }else{
                echo  "-------------" ;
              }
                 ?>     </td>
                <td> <a href="actualizar.php?accion=actualizar&id=<?= $reg['id'] ?>">Editar </a><a href="eliminar.php?accion=eliminar&id=<?= $reg['id'] ?>">Eliminar</a></td>
                
              </tr>           
              <?php 
                  endforeach; 
                else:  
              ?>
            <td colspan="4"> No existen registros para mostrar... :( </td>
              <?php endif; ?>
            </tbody>
          </table>
      </div>
    </div><!-- /.container -->
    <?php //Sólo mostramos los enlaces a páginas si existen registros a mostrar
      if($totalregistros>=1):  
    ?>
    <nav aria-label="Page navigation example" class="text-center">
      <ul class="pagination">
       
        <?php 
         //Comprobamos si estamos en la primera página. Si es así, deshabilitamos el botón 'anterior'
          if($pagina==1): ?>
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
          <?php else: ?>
            <li class="page-item"><a class="page-link" href="listado.php?pagina=<?php echo $pagina-1; ?>&regsxpag=<?= $regsxpag ?>"> &laquo;</a></li>
         <?php  
          endif;
          //Mostramos como activos el botón de la página actual
          for($i=1;$i<=$numpaginas;$i++){
            if($pagina==$i){
              echo '<li class="page-item active"> 
                <a class="page-link" href="listado.php?pagina=' . $i . '&regsxpag=' . $regsxpag . '">'. $i .'</a></li>';
             }else {
              echo '<li class="page-item"> 
                <a class="page-link" href="listado.php?pagina=' . $i . '&regsxpag=' . $regsxpag . '">'. $i .'</a></li>';
            }
          }
         //Comprobamos si estamos en la última página. Si es así, deshabilitamos el botón 'siguiente'
          if($pagina==$numpaginas): ?>  
             <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
          <?php else: ?>
            <li class="page-item"><a class="page-link" href="listado.php?pagina=<?php echo $pagina+1; ?>&regsxpag=<?= $regsxpag ?>"> &raquo; </a></li>
          <?php endif; ?>    
      </ul>         
    </nav>
    <?php endif;  //if($totalregistros>=1): ?>
     
</html>

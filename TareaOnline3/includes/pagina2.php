<div class="encabezado text-center">	
  <h1><img class="alineadoTextoImagen" src="images//bombilla.png" />DAWES-Práctica#2:Sesiones y Cookies</h1>
</div> 
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="includes/logout.php">Cerrar sesión</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="frmInicio.php">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="frmPagina2.php">Página 2</a>
      </li>
    </ul>
  </div>
</nav>
<div class="centrar">	
  <div class="container cuerpo text-center">	
    <h1><strong>MiSitio-</strong>Página2</h1>  
    <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Bienvenido <?php if(isset($_COOKIE['abierta'])){ echo "'" . $_COOKIE['abierta'] . "'" ; } else { echo "'" . $_SESSION['logueado'] . "'" ;} ?> </h2> </p>
  </div>
  <div class="container cuerpo text-center">
    <h4>Lorem Ipsum</h4>
<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. </p>

</div>
</div>  
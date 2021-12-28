<?php
require_once 'conectarbd.php';
/**
 * La página a la que deseamos acceder mediante los botones de paginación se recibirá 
 * a través de la variable 'pagina' de GET. Si no se recibe ningún valor, se tomará, por 
 * defecto, el mostrar la página nº1
 */
 //Establecemos el número de registroa a mostrar por página,por defecto 2
 $regsxpag = (isset($_GET['regsxpag']))? (int)$_GET['regsxpag']:2;
 //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
 $pagina = (isset($_GET['pagina']))? (int)$_GET['pagina']:1;

 //Definimos la variable $inicio que indique la posición del registro desde el que se
 // mostrarán los registros de una página dentro de la paginación.
 $inicio= ($pagina>1)? (($pagina*$regsxpag)-$regsxpag): 0;
 //Preparamos la consulta que vamos a realizar utilizando el parámetro SQL_CALC_FOUND_ROWS, que requerido por la función FOUND_ROWS() para poder obtener el número de filas obtenidas de la consulata sin tener que realizar otra nueva con el COUNT
 $sql="SELECT SQL_CALC_FOUND_ROWS * FROM usuarios LIMIT $inicio, $regsxpag";
 $registros = $pdo->prepare($sql);
 //Ejecutamos la consulta...
 $registros->execute();
 //Almacenamos en una variable los registros obtenidos de la consulta
 $registros=$registros->fetchAll(PDO::FETCH_ASSOC);
 
 //Calculamos el número de registros obtenidos
 $totalregistros= $pdo->query("SELECT FOUND_ROWS() as total");
 $totalregistros= $totalregistros->fetch()['total'];
 //Determinamos el número de páginas de la que constará mi paginación
 $numpaginas=ceil($totalregistros/$regsxpag);

?>

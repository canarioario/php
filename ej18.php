<?php
/*
Ejercicio 18. Crea un array con el contenido de la siguiente tabla:
Frutas Deportes Idiomas
Manzana Futbol Español
Naranja Tenis Inglés
Sandia Baloncesto Francés
Fresa Beisbol Italiano
Recórralo y muestre el contenido del array en una la tabla striped HTML.
*/

$tabla = array ( "Frutas" =>  array ( "Manzana",
                                    "Naranja",
                                    "Sandia" ,
                                    "Fresa"
                                     ),
                  "Deportes" => array ( "Futbol",
                                      "Tenis",
                                      "Baloncesto" ,
                                      "Beisbol"

                                     ),
                  "Idiomas"  =>  array ( "Español",
                                        "Ingles",
                                        "Frances",
                                        "Italiano"
                                              )
                );
               

?>

<table border=1>
<tr>
<th>Frutas</th>
<th>Deportes</th>
<th>Idiomas</th>
</tr>
<tr>
<th><?=$tabla["Frutas"][0] ?> </th>
<th><?=$tabla["Deportes"][0] ?> </th>
<th><?=$tabla["Idiomas"][0] ?> </th>   
</tr>
<tr>
<th><?=$tabla["Frutas"][1] ?> </th>
<th><?=$tabla["Deportes"][1] ?> </th>
<th><?=$tabla["Idiomas"][1] ?> </th>   
</tr>
<tr>
<th><?=$tabla["Frutas"][2] ?> </th>
<th><?=$tabla["Deportes"][2] ?> </th>
<th><?=$tabla["Idiomas"][2] ?> </th>   
</tr>
<tr>
<th><?=$tabla["Frutas"][3] ?> </th>
<th><?=$tabla["Deportes"][3] ?> </th>
<th><?=$tabla["Idiomas"][3] ?> </th>   
</tr>

</table>
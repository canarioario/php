<?php

function paginas_contenidos($db,$defaults,$lim_x_pagina,$vecinos_paginador,$uri)
{
    $sql_total_logs=def2sql_contenidos($defaults, $lim_x_pagina, true);
    $res =& $db->query($sql_total_logs);
    list($gran_total)=$res->fetchRow();
    $tot_paginas=ceil($gran_total/$lim_x_pagina);
    $tohtml="$gran_total resultados. Páginas: ";
    $pagina=$defaults["pagina"];
    $defaults2=$defaults;
    $arr_paginador=paginador($pagina,$vecinos_paginador,$tot_paginas);
    foreach($arr_paginador as $esta_pagina)
    {
        $no_pag=$esta_pagina["no_pag"];
        $caption=$esta_pagina["caption"];
        if($no_pag)
        {
            $defaults2["pagina"]=$no_pag;
            $cons=urlencode(base64_encode(gzcompress(serialize($defaults2))));
            $tohtml.=" <a href=\"$uri?cons=$cons\">$caption</a> ";
        }
        else
        {
            $tohtml.=" $caption ";
        }
    }
    return $tohtml;
}

function paginador($pagina,$vecinos,$tot_paginas)
{
    $arr_paginador=array();
    if($pagina>($vecinos+1))
    {
       $arr_paginador[]=array("no_pag"=>1,"caption"=>"1");
    }
    if($pagina>($vecinos*22))
    {
        $bloque=$pagina-20*$vecinos;
        $arr_paginador[]=array("no_pag"=>$bloque,"caption"=>"[&minus;&minus;]");
    }
    if($pagina>($vecinos+2))
    {
        $bloque=max(2,$pagina-2*$vecinos-1);
        $arr_paginador[]=array("no_pag"=>$bloque,"caption"=>"[&minus;]");
    }
    for($i=0;$i<$vecinos;$i++)
    {
        $no_pag=$i+$pagina-$vecinos;
        if($no_pag>0)
        {
            $arr_paginador[]=array("no_pag"=>$no_pag,"caption"=>"$no_pag");
        }
    }
    $arr_paginador[]=array("no_pag"=>0,"caption"=>"<b>[<font color=\"green\">$pagina</font>]</b>");
    for($i=0;$i<$vecinos;$i++)
    {
        $no_pag=$i+$pagina+1;
        if($no_pag<=$tot_paginas)
        {
            $arr_paginador[]=array("no_pag"=>$no_pag,"caption"=>"$no_pag");
        }
    }
    if(($pagina+$vecinos+1)<$tot_paginas)
    {
        $bloque=min($tot_paginas-1,$pagina+2*$vecinos+1);
        $arr_paginador[]=array("no_pag"=>$bloque,"caption"=>"[&plus;]");
    }
    if(($pagina+$vecinos*22)<$tot_paginas)
    {
        $bloque=$pagina+20*$vecinos;
        $arr_paginador[]=array("no_pag"=>$bloque,"caption"=>"[&plus;&plus;]");
    }
    if(($pagina+$vecinos)<$tot_paginas)
    {
        $arr_paginador[]=array("no_pag"=>$tot_paginas,"caption"=>"$tot_paginas");
    }
    return $arr_paginador;
}

function def2sql_contenidos($defaults, $lim_x_pagina, $solo_total=false)
{
    $tipo_contenido =$defaults["tipo_contenido"];
    $titulo         =$defaults["titulo"];
    $categoria      =$defaults["categoria"];
    $proveedor      =$defaults["proveedor"];
    $servicio       =$defaults["servicio"];
    $sql_donde=$tipo_contenido?" AND tipo_contenido=$tipo_contenido ":"";
    $sql_donde.=$titulo     ?" AND titulo LIKE '%$titulo%' ":"";
    $sql_donde.=$categoria  ?" AND id_categoria=$categoria ":"";
    $sql_donde.=$proveedor  ?" AND id_proveedor=$proveedor ":"";
    $sql_donde.=$servicio   ?" AND id_servicio= $servicio " :"";
    $pagina=$defaults["pagina"];
    $inicio=($pagina-1)*$lim_x_pagina;
    $limite=($solo_total)?"":" LIMIT $inicio,$lim_x_pagina ";
    $campos=$solo_total?
        " COUNT(*) ":
        " ctime,titulo,tipo_contenido,id_thumb,categoria,proveedor,servicio,id_contenido,visible ";
    $consulta=<<<sql
SELECT $campos
FROM contenidos
INNER JOIN categorias USING(id_categoria)
INNER JOIN proveedores USING(id_proveedor)
INNER JOIN servicios USING(id_servicio)
WHERE proveedores.tiene_contrato=1
$sql_donde
ORDER BY ctime DESC
$limite
sql;
    return $consulta;
}
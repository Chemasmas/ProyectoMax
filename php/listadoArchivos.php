<?php
define("RUTA_USUARIO","../html/");  //Esta ruta nos debera ser pasada al momento de pedir los archivos
define("RUTA_USUARIO2","html/");

$directorio = opendir(RUTA_USUARIO); //ruta actual
$res=array();
$cnt=0;
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{

    if (is_dir($archivo))//No nos interesan los Directorios
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        //echo $archivo . "<br />";

        $res[$cnt][0]=RUTA_USUARIO2.$archivo;
        $res[$cnt++][1]=$archivo;
    }
}

//print_r(json_encode($res));
echo json_encode($res);
?>
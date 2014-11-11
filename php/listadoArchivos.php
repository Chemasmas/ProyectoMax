<?php
define("RUTA_USUARIO","../html");  //Esta ruta nos debera ser pasada al momento de pedir los archivos

$directorio = opendir(RUTA_USUARIO); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//No nos interesan los Directorios
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
    }
}
?>
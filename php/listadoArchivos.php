<?php

//Este
/*
require_once "ftp.php";

session_start();
$_SESSION["carpeta"]="..";

$res=listar_archivos("/html");
json_encode($res);
echo json_encode($res);
*/



//Esta es la funcion de Listado de Directorio que usabamos antes de la entrega de la gente de sesiones.
function listado($dir="../html/")
{
    $directorio = opendir($dir); //ruta actual
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
            $res[$cnt][0]=$dir.$archivo;
            $res[$cnt++][1]=$archivo;
        }
    }

    //print_r(json_encode($res));
    echo json_encode($res);
}

//Esta llamada debe de ser modificada para evitar listar directorios no validos
if(isset($_SESSION["carpeta"]))
{
    listado($_SESSION["carpeta"]);
}
else
{
    listado();
}

?>
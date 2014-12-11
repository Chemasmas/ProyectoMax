<?php
/*
require_once "ftp.php";

session_start();
$_SESSION["carpeta"]="..";

$res=listar_archivos("/html");
json_encode($res);
echo json_encode($res);
*/

//Esta es la funcion de Listado de Directorio que usabamos antes de la entrega de la gente de sesiones.
function listado($dir)
{
    //dado que el directorio sigue una estructura
    //  dir
    //   |---HTML
    //   |---CSS
    //   |---etc...
    $directorio = opendir($dir); //ruta actual
    $res=array();
    $cnt=0;
    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {

        if (is_dir($archivo))//No nos interesan los Directorios
        {
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
    listado($_SESSION["carpeta"]."/html/");
}
else
{
    //Para pruebas
    listado("../html/");
}

?>
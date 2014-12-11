<?php

	$respuesta; //Varianble para el mensaje de vuelta
	//print_r($_POST);
	//Estos dos siempre son enviados
	
	//echo $_POST['rutaH'];
	//echo $html;
	//echo $_POST['html'];
	//echo $_POST['rutaC'];
	//echo $_POST['css'];

	//estos 3 siempre son enviados 
	$html="<html>".$_POST['html']."</html>";	//El Archivo HTML
	//debo de concatenar a la ruta un ../ para llegar a la carpeta del usuario
	$rutaHTML=$_POST['rutaH'];	//La ruta al archivo
	$rutaCSS=$_POST['rutaC'];	//La ruta al nuevo archivo de css

	//cambio mi etiqueta hechiza por el head correspondiente
	$html=str_replace("qsx","head",$html);
	$html=str_replace("wdc","body",$html);


	//Para abrir desde la carpeta del archivo
	if(isset($_SESSION["carpeta"]))
	{
    	$rutaHTML=$_SESSION["carpeta"]."/".$rutaHTML;

	}
	else
	{
    	$rutaHTML="../".$rutaHTML;
	}
	// Lo mismo para la ruta del css
	if(isset($_SESSION["carpeta"]))
	{
    	$rutaCSS=$_SESSION["carpeta"]."/".$rutaCSS;
	}
	else
	{
    	$rutaCSS="../".$rutaCSS;
	}

	//echo $html;	

	//echo getcwd() . "\n";
	//El archivo existe y se puede escribir
	if (is_writable($rutaHTML)) 
	{
		//echo "Existe ".$rutaHTML;	
		$ahtml=fopen($rutaHTML, "w");
		fwrite($ahtml, $html);
		fclose($ahtml);
		$respuesta['html']="No se pudo guardar el archivo";
	}
	else
	{
		//echo "No existe ".$rutaHTML;
		$respuesta['html']="Archivo HTML Guardado Exitosamente";
	}

	// Si nos mandaron el arreglo de estilo, habra que buscar si el archivo existe
	if(isset($_POST['css']))
	{
		//Lo abrire con el modo a
		$deco=$_POST['css'];
		
		
	}
		
?>
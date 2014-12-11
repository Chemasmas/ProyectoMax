<?php

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
	$rutaHTML="../".$_POST['rutaH'];	//La ruta al archivo
	$rutaCSS=$_POST['rutaC'];	//La ruta al nuevo archivo de css

	//cambio mi etiqueta hechiza por el head correspondiente
	$html=str_replace("qsx","head",$html);

	//echo $html;	

	echo getcwd() . "\n";
	
	if(file_exists ($rutaHTML))
	{
		echo "Existe ".$rutaHTML;	
	}
	else
	{
		echo "No existe ".$rutaHTML;
	}

	// Si nos mandaron el arreglo de estilo, habra que buscar si el archivo existe
	if(isset($_POST['css']))
	{
		//echo "enviado";
		//Debo de Verificar si existe el archivo de custom.css
	}
	else
	{
		//echo "NO enviado";
		//solo debo de sobre escribir el archivo de html

	}
		
?>
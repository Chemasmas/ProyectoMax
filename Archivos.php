<?php
 include("objetos.php");
 Include("DatosBD.php"); 
?>

<html>
<head>
<meta charset="utf-8" />
<title>Blog de Usuarios</title>

<link rel="stylesheet" href="styles.css" />

</head>
<body>

    <TABLE WIDTH=50 HEIGHT=50>

		<TD width=100 VALIGN=TOP>
		<tr rowspan="2">
		<img src="logo.png" width='150' height='80' ALIGN="left">
		</tr>
		<tr>
		<h2>UNIVERSIDAD AUT&OacuteNOMA METROPOLITANA</h2>
		</tr>
		</TD>

		<TD width=50 VALIGN=TOP>
		<tr></tr>
		<tr>
		<h3>Unidad Cuajimalpa</h3>
		</tr>
		</TD>

	</TABLE>
 
	<?php
     session_start();
	 if(isset($_SESSION["usuario"]))
	 {
	     $_SESSION["usuario"]->mostrarItems();
	  
	 }
	 else
	 {
		if(isset($_REQUEST['pswd']) && isset($_REQUEST['usuario']) && !empty($_REQUEST['usuario']) && !empty($_REQUEST['pswd']))
	    {
		 $bd = new ConectaBD();
		 $resultado = $bd->consulta_obtener("SELECT * FROM usuarios WHERE usuario =\"".$_REQUEST['usuario']."\" AND pswd
		 =\"".$_REQUEST['pswd']."\"");
		 
		 'echo "Cantidad:";
		  echo mysql_num_rows($resultado)';
		  
		  $existe = mysql_num_rows($resultado);
		  if($existe == 1)
		  {
		    $fila = mysql_fetch_array($resultado);
			$usuario = new TUsuario($fila["usuario"],$fila["nivel"],$fila["id_usuario"]);
			
		    $_SESSION["usuario"] = $usuario;
			$_SESSION["carpeta"] = "$usuario_$id";
			$_SESSION["usuario"]->mostrarItems();
		   }
		   else
		   {
		     echo "Usuario Incorrecto.<br>";
			 echo 'Sera redireccionado en un momento.';
			          header ("refresh:3; url= http://localhost/GestionUsuarios/index.php");
			 	   
		   }
		}
		else
		{
		     echo "Usuario y/o Password incorrectos.<br>";
			 echo 'Sera redireccionado en un momento.';
			          header ("refresh:3; url= http://localhost/GestionUsuarios/index.php");
		}
	 
	 }
    ?>
	
		
	
		
		<div id="divCarousel">
			<div id="divIzquierda"></div>
			<div id="divCentro">
				<ul>
					<li><img src="img/01.jpg"></li>
					<li><img src="img/02.jpg"></li>
					<li><img src="img/03.jpg"></li>
					<li><img src="img/04.jpg"></li>
					<li><img src="img/05.jpg"></li>
					<li><img src="img/06.jpg"></li>
					<li><img src="img/07.jpg"></li>
					<li><img src="img/08.jpg"></li>
					<li><img src="img/09.jpg"></li>
					<li><img src="img/10.jpg"></li>
				</ul>
			</div>
			<div id="divDerecha"></div>
			<div class="clsSalto"></div>
		</div>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/carrusel.js"></script>
    	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="script.js"></script>
	

</body>
</html>

<?php
 include("objetos.php");
 include("ftp.php");
 Include("DatosBD.php"); 
?>

<html>
<head>
<meta charset="utf-8" />
<title>Agregar Usuarios</title>
 <link rel="stylesheet" href="styles.css" />
</head>
<body>

 
	<?php
     session_start();
	 $usr = $_SESSION["usuario"];
	 if(!isset($usr) || $usr->getNivel() !=0)
	 {
	     echo "<script languaje =\"JavaScript\">";
         echo "location.href ='Archivos.php';";
         echo "</script>";
     }
	 '$_SESSION["usuario"]->getNombre()';
	    if(isset($_REQUEST['usuario']) && isset($_REQUEST['pswd']))
		{
		  if(!empty($_REQUEST['usuario']) && !empty($_REQUEST['pswd']))
		  {
		     $BD = new ConectaBD();
		     $_REQUEST['usuario'];
			 $BD->consulta_escribir("INSERT INTO usuarios(usuario,pswd,nivel) VALUES (\"".$_REQUEST['usuario']."\",\"".
			 $_REQUEST['pswd']."\",".$_REQUEST['nivel'].")");
			 echo "Usuario registrado correctamente.<br>";
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
			 nuevo_usuario($_SESSION["carpeta"]);
			 unset($_POST["usuario"]);
			 unset($_POST["pswd"]);
			 echo 'Sera redireccionado en un momento ';
			          header ("refresh:3; url= http://localhost/GestionUsuarios/Archivos.php");
		  }
		  else
		  {
		     unset($_POST["usuario"]);
			 unset($_POST["pswd"]);
			 echo "Todos los campos son obligatorio para su registro favor de llenar los campos <br>";
			 echo 'Sera redireccionado en un momento ';
			          header ("refresh:5; url= http://localhost/GestionUsuarios/agregar_usuarios.php");
		  }
		
		}
		else
		{
		?>
		
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
		
    	<div id="formContainer">
		<form id="Registro" method="post" action="agregar_usuarios.php">
			    <h1>Registro</h1>
				<center>
				<label>*Nivel del usuario</label>
				<SELECT name="nivel" size="1" id="nivel">
					<OPTION VALUE="0">Super Usuario</OPTION>
					<OPTION VALUE="1">Administrador</OPTION>
					<OPTION VALUE="2">Usuario</OPTION>
				</SELECT>
				<br><br>
				<label>*Usuario</label>
				<input type="text" name="usuario" size="20" placeholder="Usuario">
				<br>
				<label>*Contrase&ntildea </label>
				<input type="password" name="pswd" size="20" placeholder="Contraseña">
				<br>
				<input type="submit" name="Registrar" value="Registrar" />
				<a href="Archivos.php">Volver Atras</a>
				</center>
			</form>
			
			
			
    <?php

    }
?>
             </div>

        
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="script.js"></script>
</body>
</html>

<?php
 include("objetos.php");
 include("ftp.php");
 Include("DatosBD.php"); 
?>

<html>
<head>
<meta charset="utf-8" />
<title>Modificar Usuarios</title>
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
	 $usr = $_SESSION["usuario"];
	 if(!isset($usr) || $usr->getNivel() !=0)
	 {
	     echo "<script languaje =\"JavaScript\">";
         echo "location.href ='Archivos.php';";
         echo "</script>";
     }
	 
	 if(isset($_REQUEST['usuario']) && isset($_REQUEST['pswd']) && isset($_REQUEST['ID']) && isset($_REQUEST['nivel']) && isset($_REQUEST['btn']))
	 {
	 
	  if(!empty($_REQUEST['ID']))
	  {
	    $bd = new ConectaBD();
		$resultado = $bd->consulta_obtener("SELECT * FROM usuarios WHERE id_usuario =".$_REQUEST['ID']);
	    $existe = mysql_num_rows($resultado);
		
		if($existe == 1)
		{
		   $fila = mysql_fetch_array($resultado);
		   $user_aux = new TUsuario($fila["usuario"],$fila["nivel"]);
		
		if($_REQUEST['btn'] == "Modificar Usuario")
		{
		   if(!empty($_REQUEST['usuario']))
		   {
		     $_REQUEST['usuario'];
			 $bd->consulta_escribir("UPDATE usuarios SET usuario = \"".$_REQUEST['usuario']."\" WHERE id_usuario = ".$_REQUEST['ID']);
			 modificar_usuario("$_REQUEST['usuario']_$_REQUEST['ID']");
		   }
		   if(!empty($_REQUEST['pswd']))
		   {
		     $bd->consulta_escribir("UPDATE usuarios SET pswd = \"".$_REQUEST['pswd']."\" WHERE id_usuario = ".$_REQUEST['ID']);
		   }
		   if($_REQUEST['nivel']!= -1)
		   {
		     $bd->consulta_escribir("UPDATE usuarios SET nivel = \"".$_REQUEST['nivel']."\" WHERE id_usuario = ".$_REQUEST['ID']);
		   }
		   echo "Usuario:".$user_aux->getNombre()." se modificado Correctamente<br>";
		}
		else
		{
		    $bd->consulta_escribir("DELETE FROM usuarios WHERE id_usuario = ".$_REQUEST['ID']);
			echo "Usuario:".$user_aux->getNombre()." se eliminado Correctamente<br>";
			eliminar_usuario();
		}
		
	   }
	   else
	   {
	     echo "Usuario Incorrecto <br>";
	     
	   }
	     echo 'Sera redireccionado en un momento.';
			          header ("refresh:4; url= http://localhost/GestionUsuarios/modificar_usuarios.php");
	  }
	  else
	  {
	     echo "Los campos estan vacios *ID obligarotio.<br>";
			 echo 'Sera redireccionado en un momento.';
			          header ("refresh:4; url= http://localhost/GestionUsuarios/modificar_usuarios.php");
	  }
	 
	 }
	 else
	 {
	    $bd = new ConectaBD();
		$resultado = $bd->consulta_obtener("SELECT * FROM usuarios");
	    $cantidad = mysql_num_rows($resultado);
		if($cantidad > 1)
		{
?>
		  <table width="406" border="0" align="center">
		  
			  <tr>
			  <td><strong>Usuarios Registrados</strong></td>
			  </tr>
<?php
			  $fila = mysql_fetch_array($resultado);
			  for($i=1;$i<$cantidad;$i++)
			  {
				$fila = mysql_fetch_array($resultado);
?>     
			   <tr>
				   <td colspan="3">
					 <?php echo "ID: ".$fila["id_usuario"]."<br>";?>
					 <?php echo "Nombre: ".$fila["usuario"]."<br>";?>
					 <?php echo "Nivel: "; mostrar_nivel($fila["nivel"]);echo"<br>";?>
				   </td>
			   </tr>
			   
		   </table>
		   
		   
<?php
              }
	    }
	 
	 else
	 {
	     echo "<div align='center'> No hay Usuarios Registrados</div>";
	 }
?>
    
    
		
		<form method="post" action="modificar_usuarios.php">
			    <center>
				<h5>Ingresar ID y los datos que requiera modificar</h5>
				<label>*ID:
				<input type="textbox" name="ID"></label>
				
				<label>Usuario:
				<input type="textbox" name="usuario"></label>
				
				<label>Contrase&ntildea:
				<input type="password_box" name="pswd"></label>
				
				<label>Nivel del usuario:
				<SELECT name="nivel" size="1" id="nivel">
				    <OPTION VALUE="-1"> </OPTION>
					<OPTION VALUE="0">Super Usuario</OPTION>
					<OPTION VALUE="1">Administrador</OPTION>
					<OPTION VALUE="2">Usuario</OPTION>
				</SELECT></label>
				<br><br>
				
				<input type="submit" name="btn" value="Modificar Usuario" />
				<input type="submit" name="btn" value="Borrar Usuario" />
				<h5>Solo los campos con datos seran modificados</h5>
				
				<a href="Archivos.php">Volver Atras</a>
				</center>
			</form>
<?php
    }
?>

        
			
	
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="script.js"></script>
	

</body>
</html>
<?php
 include("objetos.php");
 Include("DatosBD.php"); 
?>


<?php
	$ftp_server="";
	$ftp_user_name="";
	$ftp_user_pass="";

	function nuevo_usuario($nombre){
		 
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		// Cambiamos a modo pasivo, esto es importante porque, de esta manera le decimos al 
		//servidor que seremos nosotros quienes comenzaremos la transmisión de datos.
		ftp_pasv ($conn_id, true) ;
		echo  "<br> Cambio a modo pasivo<br />";
		
		//Ruta de la carpeta del usuario 
		$dir = $nombre;

		// intentar crear el directorio $dir
		if (ftp_mkdir($conn_id, $nombre)) {
			echo "creado con éxito $dir\n";
			ftp_mkdir($conn_id, $dir+"/imagenes");
			ftp_mkdir($conn_id, $dir+"/js");
			ftp_mkdir($conn_id, $dir+"/html");
			ftp_mkdir($conn_id, $dir+"/files");
			ftp_mkdir($conn_id, $dir+"/videos");
			ftp_mkdir($conn_id, $dir+"/audio");
			ftp_mkdir($conn_id, $dir+"/estilos");
		} else {
		 echo "Ha habido un problema durante la creación de $dir\n";
		}
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
	
	function subir_archivo($carpeta,$archivo){
		session_start();
		$usr = $_SESSION["carpeta"];
		$carpetaaux=$usr+"/"+$carpeta;
		// abrir un archivo para su lectura
		$fp = fopen($archivo, 'r');
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		// Cambiamos a modo pasivo, esto es importante porque, de esta manera le decimos al 
		//servidor que seremos nosotros quienes comenzaremos la transmisión de datos.
		ftp_pasv ($conn_id, true) ;
		echo  "<br> Cambio a modo pasivo<br />";
		
		//Directorio, donde queremos subir el archivo.
		ftp_chdir($conn_id,$carpetaaux);
		echo "Cambiado al directorio necesario"; 
		
		// intentar cargar $file
		if (ftp_fput($conn_id, $archivo, $fp, FTP_ASCII)) {
			echo "Cargado correctamente $archivo\n";
		} else {
			echo "Ha habido un problema al cargar $archivo\n";
		}
		
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
	
	function bajar_archivo($carpeta,$archivo){
		session_start();
		$usr = $_SESSION["carpeta"];
		$carpetaaux=$usr+"/"+$carpeta;
		// definir algunas variables
		$local_file = '$archivo';
		$server_file = '$archivo';
		
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		//Directorio de donde queremos descargar el archivo.
		ftp_chdir($conn_id,$carpetaaux);
		echo "Cambiado al directorio necesario"; 
		
		// intenta descargar $server_file y guardarlo en $local_file
		if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
			echo "Se ha guardado satisfactoriamente en $local_file\n";
		} else {
			echo "Ha habido un problema\n";
		}
		
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
	
	function eliminar_archivo($carpeta,$archivo){
		session_start();
		$usr = $_SESSION["carpeta"];
		$carpetaaux=$usr+"/"+$carpeta;
		
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		//Directorio de donde queremos borrar el archivo.
		ftp_chdir($conn_id,$carpetaaux);
		echo "Cambiado al directorio necesario"; 
		
		// intentar eliminar el archivo $file
		if (ftp_delete($conn_id, $archivo)) {
		 echo "$file se ha eliminado satisfactoriamente\n";
		} else {
		 echo "No se pudo eliminar $file\n";
		}
		
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
	
	function modificar_usuario($nombre){
		session_start();
		$usr = $_SESSION["carpeta"];
		$old_file = $user;
		$new_file = $nombre;
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		// intentar renombrar el archivo $old_file a $new_file
		if (ftp_rename($conn_id, $old_file, $new_file)) {
		 echo "se ha renombrado $old_file a $new_file con éxito\n";
		} else {
		 echo "Hubo un problema al renombrar $old_file a $new_file\n";
		}
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
     
	 
	 function eliminar_usuario(){
		session_start();
		$dir = $_SESSION["carpeta"];
		
		//Conexion a nuestro servidor
		$conn_id = ftp_connect($ftp_server);
		
		//Usuario y contraseña del servidor
		$resultado = ftp_login($conn_id, $ftp_user_name,$ftp_user_pass);
		
		// Comprobar la conexion
		if ((!$conn_id) || (!$resultado)) {
			echo "Fallo la conexion"; die;
		} else {
			echo "Conexion con exito.";
		}
		
		// intentar eliminar el directorio $dir
		if (ftp_rmdir($conn_id, $dir)) {
			echo "Se ha eliminado correctamente el directorio $dir\n";
		} else {
			echo "Hubo un problema al eliminar el directorio $dir\n";
		}
		
		//cerramos la conexión FTP
		ftp_close($conn_id);
	}
?>
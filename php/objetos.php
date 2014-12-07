 <?php
	function mostrar_nivel($nivel)
	{
	  switch($nivel)
	  {
	    case 0: echo "Super Usuario"; break;
		case 1: echo "Administrador"; break;
		case 2: echo "Usuario"; break;
	  }
	
	}
	
	class ConectaBD
	{
	
	 private $sql;
	 private $cmd;
	 private $conexion;
	 private $servidor;
	 private $usuario;
	 private $password;
	 private $nombreBD;
	 
	 function __construct()
	 {
	   $this->conexion = mysql_connect("localhost","root","") or die("No se pudo conectar con la BD");
	   mysql_close($this->conexion);
	 }
	   
	   function consulta_escribir($sql)
	   {
	     $this->conexion = mysql_connect("localhost","root","");
		 mysql_select_db("userdb",$this->conexion)or die("No existe la BD");
		 mysql_query($sql,$this->conexion) or die ("La consulta SQL tiene un Error".mysql_error());
		 mysql_close($this->conexion);
	   }
	   
	   function consulta_obtener($sql)
	   {
	     $this->conexion = mysql_connect("localhost","root","");
		 mysql_select_db("userdb",$this->conexion)or die("No existe BD");
		 $resultado = mysql_query($sql,$this->conexion) or die ("La consulta SQL tiene un Error".mysql_error());
	     mysql_close($this->conexion);
		 return $resultado;
	   }
	}
	
	class TUsuario
	{
	  private $nombre;
	  private $nivel;
	  private $id;
	  
	  function __construct($nombre,$nivel,$id)
	  {
	    $this->nombre = $nombre;
		$this->nivel = $nivel;
		$this->id = $id;
	  }
	  
	  function getNivel()
	  {
	    return $this->nivel;
	  }
	  
	  function getNombre()
	  {
	    return $this->nombre;
	  }
	  
	  function getId()
	  {
	    return $this->id;
	  }
	  
	  function mostrarItems()
	{
	    echo "<strong>";
		echo "<div align='center'> Bienvenido: $this->nombre.</div><br></strong>";
		
		switch($this->nivel)
		{
		 case 0:
		  echo "<table width=\"200\" border=\"0\" align=\"center\">";
		  echo "<tr>";
		  echo "<td>";
		        echo "<form action=\"agregar_usuarios.php\" method=\"post\" name=\"btnAgregar\">";
				echo "<center>";
				echo "<input type=\"submit\" name=\"btnAgregarUsuario\" value=\"Agregar Usuario\"/>";
				echo "</center>";
			    echo "</form>";
		  echo "</td>";
		  echo "<td>";
		        echo "<form method=\"post\" action=\"modificar_usuarios.php\" name=\"btnModificarU\">";
				echo "<input type=\"submit\" name=\"btnModificarUsuario\" value=\"Modificar Usuario\"/>";
				echo "</form>";
		  echo "</td>";
		  echo "<td>";
		  
		        echo "<form method=\"post\" action=\"ArchivosFtp.php\" name=\"enviador\">";
                echo "<input type=\"submit\" name=\"btnFtp\" value=\"Subir Archivo\"/>";
			    echo "</form>";
		  echo "</td>";
		  echo "<td>";
		  
				  echo "<form method=\"post\" action=\"salir.php\" name=\"btnSalir\">";
				  echo "<input type=\"submit\" name=\"btnSalir\" value=\"Salir\"/>";
				  echo "</form>";
		          echo "</td>";
	      echo "</tr>";
		  echo "</table>";
		     break;
		
		 case 1:
		  
		  echo "<table width=\"200\" border=\"0\" align=\"center\">";
		  echo "<tr>";
		  echo "<td>";
		  
		  echo "<form method=\"post\" action=\"ArchivosFtp.php\" name=\"enviador\">";
                echo "<input type=\"submit\" name=\"btnFtp\" value=\"Subir Archivo\"/>";
			    echo "</form>";
		  echo "</td>";
		  echo "<td>";
		  
		  echo "</td>";
		  echo "<td>";
		  echo "</td>";
		        echo "<td>";
		        echo "<form method=\"post\" action=\"salir.php\" name=\"btnSalir\">";
				echo "<input type=\"submit\" name=\"btnSalir\" value=\"Salir\"/>";
				echo "</form>";
		  echo "</td>";
		  echo "</tr>";
		  echo "</table>";
		       break;
		
		 case 2:
		  
		  echo "<table width=\"200\" border=\"0\" align=\"center\">";
		  echo "<tr>";
		  echo "<td>";
		  
		  echo "<form method=\"post\" action=\"ArchivosFtp.php\" name=\"enviador\">";
                echo "<input type=\"submit\" name=\"btnFtp\" value=\"Subir Archivo\"/>";
			    echo "</form>";
		  echo "</td>";
		  echo "<td>";
		  
		  echo "</td>";
		  echo "<td>";
		  echo "</td>";
		        echo "<td>";
		        echo "<form method=\"post\" action=\"salir.php\" name=\"btnSalir\">";
				echo "<input type=\"submit\" name=\"btnSalir\" value=\"Salir\"/>";
				echo "</form>";
		  echo "</td>";
		  echo "</tr>";
		  echo "</table>";
		       break;
		}
	  }
 }
	

?>
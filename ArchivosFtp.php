<?php
 include("objetos.php");
 Include("DatosBD.php"); 
?>

<html>
<head>
   <title>Archivos FTP </title>
   <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<center>
  <form name="enviador" method="post" action="ftp.php" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000">
    Archivo: <input type="file" name="archivo">
	<br><br>
  <input type="submit">
  <a href="Archivos.php">Volver Atras</a>
</center>
</form>
</body>
</html>


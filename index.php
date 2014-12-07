<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
		     
         <link rel="stylesheet" href="styles.css"/>
        
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
		
    	<div id="formContainer">
		
			<form id="login" method="post" action="Archivos.php">
			    
				<h1>Login</h1>
				<center>
				<input type="text" name="usuario" size="20" placeholder="username">
				<br>
				<input type="password" name="pswd" size="12" placeholder="password">
				<br><br>
				<input type="submit" name="login" value="Iniciar sesion">
			    </center>
			</form>
		</div>

        
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="script.js"></script>

    </body>
</html>



<!DOCTYPE html>
<html>
    <head>
        <title> Login</title>
        <script type= "text/JavaScript" src="js/md5.js"></script>
        <script type= "text/JavaScript" src="js/forms.js"></script>
        <link rel='stylesheet' type='text/css' href='css/login.css' />
    </head>
    <body>
    <header>
    
    </header>
        <?php
        if (isset($_GET['error'])) {
            echo '<p> Error Logging In! </p>';
        }
        ?>
        <div id="wrapper">
			<form name="login-form" class="login-form" action="includes/login.php" method="post">
	
		<div class="header">
		<h1>Login</h1>
		<span>Introduce tu usuario</span>
		</div>
		<div class="content">
		<input name="usuario" type="text" class="input username" placeholder="Usuario" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>		
		</div>
		<div class="footer">
		<input type="submit" name="submit" value="Login" class="button" />
        </form>
		</div>
	</div>
	<div class="gradient"></div>
    </body>
</html>


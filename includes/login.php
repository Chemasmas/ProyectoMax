<?php
if(isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	if($usuario == "admin" && $password == "admin"){
			header('Location: ../template.php');
		
	}else{
		header('Location: ../index.php?error=1');
	}
}
?>
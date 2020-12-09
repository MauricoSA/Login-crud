<?php 

	// se debe usasr si se usara una variable de funcion
	session_start();
	require_once "../clases/usuarios.php";
	$usuarios = new usuario();
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$usuarios->ingresar($usuario,$password);
	
 ?>
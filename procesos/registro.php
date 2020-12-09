<?php 
	require_once "../clases/usuarios.php";
	$usuarios = new usuario();
	$nombre =  $_POST['nombre'];
	$Apaterno = $_POST['Apaterno'];
	$Amaterno = $_POST['Amaterno'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$respuesta = $usuarios->agregarUsuarios($nombre, $Apaterno, $Amaterno, $email, $usuario, $password);
	if ($respuesta) {
?>
	<script>
		alert("Registro Exitoso!");
		window.location.href='../registrarse.php';
	</script>
<?php  
	
	
	} else {
		  die("Connection failed: " . mysqli_connect_error());
?>
	<script>
		alert("Fallo!");
		window.location.href='../registrarse.php';
	</script>

<?php  
	
	}

 ?>
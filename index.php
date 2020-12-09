<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "dependencias.php"; 
		session_start();
		if (isset($_SESSION['usuario'])) {
			header('location:../index.php');
		}
	?>

</head>
<body>

	<div class="container">
		<h1>Inicia sesión</h1>
		<div class="row">
			<div class="col-sm-4">
				<form action="procesos/login.php" method="post">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control">
					<br>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<br>
					<button class="btn btn-primary">ingresar</button>
					<a href="registrarse.php" class="btn btn-success">Registrarse</a>
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>
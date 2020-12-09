<!DOCTYPE html>
<html>
<head>
	<title>"Registrate"</title>
	<?php 
		require_once "dependencias.php";
	 ?>
</head>
<body>
	<div class="container">
		<h1>Registrate</h1>
		<div class="row">
			<div class="col-sm-4">
				<form action="procesos/registro.php" method="post">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required="">
					<br>
					<label for="Apaterno">Apellido Paterno</label>
					<input type="text" name="Apaterno" class="form-control" required="">
					<br>
					<label for="Amaterno">Apellido Materno</label>
					<input type="text" name="Amaterno" class="form-control" required="">
					<br>
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" required="">
					<br>
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" class="form-control" required="">
					<br>
					<label for="password">Password</label>
					<input type="text" name="password" class="form-control" required="">
					<br>
					<button class="btn btn-danger">Registrar</button>
					<a href="index.php" class="btn btn-primary">Logear</a>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
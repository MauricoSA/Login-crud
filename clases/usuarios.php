<?php 
	require_once "conexion.php";
	class usuario extends conexion{
		public function ingresar($usuario, $password){
			$conexion = conexion::conectar();
			$password = sha1($password);
			$sql = "SELECT count(*) as total FROM usuario WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion,$sql);
			$datos = mysqli_fetch_array($result);
			if ($datos['total' > 0]) {

				//encontro usuario
				$_SESSION['usuario'] = $usuario;
				header("location:../vistas/inicio.php")
				;
			}else{
				//no encontro el usuario
				header("location:../index.php");
			}
		}
		public function agregarUsuarios($nombre, $Apaterno, $Amaterno, $email, $usuario, $password) {
			$conexion = conexion::conectar();
			$password = sha1($password);
			$sql = "INSERT INTO usuario (nombre, A_paterno, A_materno, email, usuario, password) VALUES ('$nombre', '$Apaterno', '$Amaterno', '$email', '$usuario', '$password')";
			$result = mysqli_query($conexion, $sql);
			return $result;

		}
	}

 ?>
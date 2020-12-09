<?php 
	class crud{
		public function agregar($datos){
			$obj = new conexion();
			$conexion = $obj->conectar();
			$sql = "INSERT INTO gasto (consep_gasto, can_gasto, fecha ) 
					VALUES ('$datos[0]',
							'$datos[1]',
							'$datos[2]')";
			return mysqli_query($conexion,$sql);
		}
	public function obtenerDatos($id_gasto){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "SELECT id_gasto, 
						consep_gasto,
						can_gasto,
						fecha
					FROM gasto
					where id_gasto='$id_gasto'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			$datos = array(
					'id_gasto'=>$ver[0], 
					'ConGastoU'=>$ver[1], 
					'CanGastoU'=>$ver[2], 
					'fechaU'=>$ver[3]
				);

			return $datos;
		}
		public function actualizar($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$sql = "UPDATE gasto SET consep_gasto = '$datos[0]', 
										can_gasto = '$datos[1]', 
										fecha = '$datos[2]'
										WHERE id_gasto = '$datos[3]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($id_gasto){
			$obj =  new conectar();
			$conexion = $obj->conexion();

			$sql = "DELETE from gasto where id_gasto = '$id_gasto'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
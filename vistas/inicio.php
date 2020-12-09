<?php 
session_start();
if(isset($_SESSION['usuario'])){
	require_once "dependencias.php";
	require_once "menu.php";
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Gasto</title>
		<?php require_once "scripts.php"; ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="card text-left">
						<div class="card-header">
							Mis gastos.
						</div>
						<div class="card-body">
							<span class="btn btn-primary" data-toggle="modal" data-target="#agregardatosmodal">
								Agregar nuevo <span class="fas fa-plus-circle"></span>
							</span>
							<hr>
							<div id="tablaDatatable"></div>
						</div>
						<div class="card-footer text-muted">
							By Shankz_scrafs :-P.
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="agregardatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Agrega El Gasto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frmnuevo">
							<label>Concepto Gasto</label>
							<input type="text" class="form-control input-sm" id="ConGasto" name="ConGasto">
							<label>Cantidad De Gasto </label>
							<input type="text" class="form-control input-sm" id="CanGasto" name="CanGasto">
							<label>Fecha - "YYYY-MM-DD"</label>
							<input type="text" class="form-control input-sm" id="fecha" name="fecha">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" id="btnagregarnuevo" class="btn btn-primary">Agregar Nuevo</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal-2 -->

		<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Actualizar Gasto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frmnuevoU">
							<input type="text" hidden="" id="id_gasto" name="id_gasto">
							<label>Concepto Gasto</label>
							<input type="text" class="form-control input-sm" id="ConGastoU" name="ConGastoU">
							<label>Cantidad De Gasto</label>
							<input type="text" class="form-control input-sm" id="CanGastoU" name="CanGastoU">
							<label>Fecha- "YYYY-MM-DD"</label>
							<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" id="btnActualizar">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
	<script type="text/javascript">
	//apertura docuemto jquery
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnagregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/agregar.php",
				success:function(r){
					if (r==1) {
						//para limpiar el formulario
						$('#frmnuevo')[0].rest();
						//para recargar en automatico la tabla.
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Agregado Con Exito :D");
					}else{
						alertify.error("No se pudo agregar. :(");
					}
				}
			});

		});

		});
</script>
<script type="text/javascript">
	function agregaFrmActualizar(id_gasto){
		$.ajax({
			type:"POST",
			data:"id_gasto=" + id_gasto,
			url:"Login_gasto/procesos/obtenerDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id_gasto').val(datos['id_gasto']);
				$('#ConGastoU').val(datos['ConGasto']);
				$('#CanGastoU').val(datos['CanGasto']);
				$('#fechaU').val(datos['fecha']);

			}
		});
	}
	function EliminarDatos(id_gasto){
		alertify.confirm('Eliminar un juego', '¿Seguro de elimiar este gasto?', function(){ 
				$.ajax({
					type:"POST",
					data:"id_gasto=" + id_gasto,
					url:"Login_gasto/procesos/eliminar.php",
					success:function(r){
						if (r==1) {
							$('#tablaDatatable').load('tabla.php');
							alertify.success("Eliminado con exito!");
						}else{
							alertify.error("No se pudo eliminar");
						}
					}
				});			
			 }
                , function(){ alertify.error('Cancel')});
	}
</script>
<?php  
} else {
	header("location:../inicio.php");
}
?>
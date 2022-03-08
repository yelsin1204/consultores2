


<!--fatan sus variables <?php ?>
//if($_SESSION["rol"] != "secretaria" ){

//  echo '<script>

  // window.location="inicio";
  // </script>';

  // return;
}

-->


<!---mostar-->
<div class="content-wrapper">
	<section class="content-header">
		<h1>Lista de Usuarios</h1>

	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<button class="btn btn-primary btn-lg" data-toggle="modal" tabindex="-1" data-target="#CrearSecretaria">Crear nuevo usuario</button>

			</div>


			<div class="box-body">

				<table class="table table-bordered table-hover table-striped DT" id="example">
					<thead>
						<tr>
							<th>N</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Rol de Usuario</th>
					

							<th>Editar / Borrar</th>
						</tr>
					</thead>

					<tbody>

						<?php

						$columna=null;
						$valor=null;

						
						$resultado = SecretariasC::VerSecretariasC($columna,$valor);

						foreach ($resultado as $key => $value) {
							
							echo '<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["usuario"].'</td>
							<td>'.$value["clave"].'</td>
							<td>'.$value["nombre"].'</td>
							<td>'.$value["apellido"].'</td>
							<td>'.$value["rol"].'</td>


							
							<td>



							<div class="btn-group">


							<button class="btn btn-success EditarSecretaria" Sid="'.$value["id"].'" data-toggle="modal" data-target="#EditarSecretaria"><i class="fa fa-pencil"></i></button>
							
							

							<button class="btn btn-danger EliminarSecretaria"  Sid="'.$value["id"].'"  bfoto ="'.$value["foto"].'"><i class="fa fa-times"></i></button>
							
							</div>

							</td>

							</tr>';

						}

						?>
						
						
					</tbody>
					
				</table>
			</div>
		</div>


	</section>
</div>





<!---crear-->

<div class="modal fade" rol="dialog" id="CrearSecretaria">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" role="form" enctype="multipart/form-data">
				<div class="modal-header d-block bg-primary">
					<h3 class="modal-title text-center">Crear nuevo  usuario</h3>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<div class="box-body">
						<div class="col-xs-5">

							<h4>Usuario</h4>
							<input type="text" class="form-control input-lg" name="usuario" id="usuario" >
							<input type="hidden" name="rolS" >  
							
						</div>
						<div class="col-lg-5">
							<h4>Contraseña</h4>
							<input type="
							" class="form-control input-lg" name="clave" >
							
						</div>

						<div class="col-lg-5">
							<h4>Nombres</h4>
							<input type="text" class="form-control input-lg" name="nombre" required >
							
						</div>
						<div class="col-lg-5">
							<h4>Apellidos</h4>
							<input type="text" class="form-control input-lg" name="apellido" >
						</div>

						<div>
						<div class="col-lg-5">
							<h4>Rol de usuario</h4>
							<select class="form-control" name="rol">
								<option> selecione rol</option>
								<option> editor</option>
								<option> lector</option>
								<option> administrador</option>
							</select>
						</div>
						</div>

						<div class="col-lg-5">
							<h4>Foto</h4>
							<input type="file" class="form-control input-lg" name="foto" >
							<p class="help-block">Peso permitido 200MB MAX</p>
							<img src="Vistas/img/defecto.png" class="img-thumbnail" width="60px";>

							
						</div>

				
						
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Crear</button>
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>

					<?php

					$crear = new SecretariasC();
					$crear -> CrearSecretariaC();

					?>
				</div>
				
			</form>
		</div>
	</div>
</div>




<!-------////  EDITAR MODALLLL--  //-->
<div class="modal fade" rol="dialog" id="EditarSecretaria">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" role="form" enctype="multipart/form-data">
				<div class="modal-header d-block bg-primary">
					<h3 class="modal-title text-center">Administradores</h3>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				
				<div class="modal-body">
					<div class="box-body">
						<div class="col-lg-5">

							<h3>Usuario</h3>
							<input type="text" class="form-control input-lg" name="usuarioE" id="usuarioE" >
							<input type="hidden" name="Sid" id="Sid">  
							
						</div>
						<div class="col-lg-5">
							<h3>Clave</h3>
							<input type="text" class="form-control input-lg" name="claveE" id="claveE" >
							
						</div>

						<div class="col-lg-5">
							<h3>Nombre</h3>
							<input type="text" class="form-control input-lg" name="nombreE" id="nombreE" >
							
						</div>
						<div class="col-lg-5">
							<h3>Apellido</h3>
							<input type="text" class="form-control input-lg" name="apellidoE" id="apellidoE" >
						</div>
						<div class="col-lg-5">
							<h3>Foto</h3>
							<input type="file"  name="fotoE" id="fotoE" >
							<img src="Vistas/img/defecto.png" class="img-thumbnail visor" width="100px";>
							<p class="help-block">Peso permitido de 200MB</p>
							<input type="hidden" name="imagenActual" id="imagenActual" >
						</div>

					</div>
				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Guardar Datos</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

				<?php

				$actualizarD = new SecretariasC();
				$actualizarD -> ActualizarSecretariaC();

				?>
			</div>
			
		</form>
	</div>
</div>



<?php
$borrarD = new SecretariasC();
$borrarD -> BorrarSecretariaC();

?>

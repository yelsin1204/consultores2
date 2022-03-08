
<div class="content-wrapper">
	<section class="content-header">
		<h1>Lista de Contactos</h1>

	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<button style=" border-radius: 10px "; class="btn btn-primary btn-lg" data-toggle="modal" tabindex="-1" data-target="#CrearDoctor">Agregar nuevo contacto</button>
				<a href="generarE.php" class="btn btn-success btn-flat" style=" border-radius: 10px ";>Exportar Excel</a>
				<a href="generarW.php" class="btn btn-primary btn-flat" style=" border-radius: 10px ";>Exportar Word</a>
			</div>


			<div class="box-body" >

				<table class="table table-bordered table-hover table-striped  DT" id="example">
					<thead>
						<tr>
							<th>N</th>
							<th>Apellidos</th>
							<th>Nombres</th>
							<th>Teléfono</th>
							<th>Celular </th>

							<th>Foto</th>
							<th>Editar-Borrar-Perfil-Memo</th>
						</tr>
					</thead>

					<tbody>

						<!--para vizualizar los campos de la tabla//-->

						<?php

						$columna = null;
						$valor = null;

						$resultado = funcionariosC::VerfuncionariosC($columna, $valor);

						foreach ($resultado as $key => $value) {
							
							echo '<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["apellido"].'</td>
							<td>'.$value["nombre"].'</td>
							
							<td>'.$value["telefono"].'</td>
							<td>'.$value["telefono2"].'</td>
							
							
							<td><img src="'.$value["foto"].'"   width="100px" >
						
							</td>
							

							<td>
							<div class="btn-group">
							
							
							<button class="btn btn-success EditarDoctor" Did="'.$value["id"].'" data-toggle="modal" data-target="#EditarDoctor"><i class="fa fa-pencil"></i></button>
							

							<button class="btn btn-danger EliminarDoctor"  Did="'.$value["id"].'"><i class="fa fa-times"></i> </button>
							 <a href="http://localhost/Usuarios/perfil/'.$value["id"].'" class="btn btn-primary btn-flat"> Perfil</a>
							<a target="" href="ejemplo2.php?id='.$value["id"].'" class="btn btn-warning" ><i class="fa fa-download"></i>Memo</a>

							</td>

							
							
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

      
            
     





<div class="modal fade" rol="dialog" id="CrearDoctor" >
	<div class="modal-dialog">
		<div class="modal-content">


			<form method="post" role="form"  enctype="multipart/form-data" id="tu-id">  <!--para poder cargar archivos-->
				<div class="modal-header d-block bg-primary">
					<h4 class="modal-title text-center">NUEVO CONTACTO</h4>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-lg-5">
							<h4>Apellidos</h4>
							<input type="text" class="form-control input-lg" name="apellido" >
							<input type="hidden" name="rolD" >  
							
						</div>

						<div class="col-lg-5">
							<h4>Nombres</h4>
							<input type="text" class="form-control input-lg" name="nombre" >
							
						</div>

						<div class="col-lg-5">
							<h4>Dni/Carnet de extranjeria</h4>
							<input  class="form-control input-lg" rows="3"  name="dni"></input>
						</div class="col-lg-5">

						<div class="col-lg-5">

							<h4>Fecha nacimiento</h4>
							<input type="text" class="form-control input-lg" data-inputmask="'alias':'dd/mm/yyyy'" data-mask  name="fecha" >
						</div>


						<div class="col-lg-5">
							<h4>Dirección</h4>
							<input type="text" class="form-control input-lg" name="direccion" >
						</div>


						<div class="col-lg-5">
							<h4>Ciudad</h4>
							<input   class="form-control input-lg" rows="3"  name="ciudad"></input>
						</div class="col-lg-5">

						<div class="col-lg-5">
							<h4>Institución</h4>
							<input type="text" class="form-control input-lg" name="institucion" >
						</div>

              
						<div class="col-lg-5">
							<h4>Cargo que desempeña</h4>
							<input type="text" class="form-control input-lg" name="cargo" >
						</div>

						<div class="col-lg-5">
							<h4>Teléfono</h4>
							<input type="text" class="form-control input-lg" name="telefono" >
						</div>
						<div class="col-lg-5">
							<h4>Celular </h4>
							<input type="text" class="form-control input-lg" name="telefono2" >
						</div>
						<div class="col-lg-5">
							<h4>Celular 2</h4>
							<input type="text" class="form-control input-lg" name="telefono3" >
						</div>
						<div class="col-lg-5">
							<h4>Correo institucional</h4>
							<input type="text" class="form-control input-lg" name="correo" >

						</div>
						<div class="col-lg-5">
							<h4>Correo personal </h4>
							<input type="text" class="form-control input-lg" name="correo2" >

						</div>

					



						<div class="col-lg-5">
							<h4>Foto</h4>
							<input type="file" class="form-control input-lg" name="foto" >
							<p class="help-block"></p>
						</div>

						<div class="col-lg-5">
							<input type="hidden" name="creado_por" value="<?php echo $_SESSION["nombre"]?>"> <!--con esto traemos el id de la personas-->
						</div class="col-lg-5">

						<div class="col-lg-5">
							<h4>Curriculum Vitae</h4>
							<input type="file"   class="form-control input-lg" rows="3"  name="cv[]" multiple="">


						</div class="col-lg-5">
						<div class="col-lg-5">
							<h4>Nota</h4>
							<textarea   class="form-control input-lg" rows="3"  name="nota"></textarea>
						</div class="col-lg-5">




					</div>
					
				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

				<?php

				$crear = new funcionariosC();
				$crear -> CrearfuncionarioC();

				?>
				
			</form>
		</div>
	</div>
</div>






<div class="modal fade" rol="dialog" id="EditarDoctor" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" role="form" enctype="multipart/form-data">
				<div class="modal-header d-block bg-primary">
					<h2 class="modal-title text-center">CONTACTOS</h2>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-lg-5">

							<h4>Apellido</h4>
							<input type="text" class="form-control input-lg" id="apellidoE" name="apellidoE" >
							<input type="hidden" id="Did" name="Did" >
							
						</div>
						<div class="col-lg-5">
							<h4>Nombre</h4>
							<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" >
							
						</div>
						<div class="col-lg-5">
							<h4>Cargo</h4>
							<input type="text" class="form-control input-lg" id="cargoE" name="cargoE" >
						</div>
						<div class="col-lg-5">
							<h4>Fecha nacimiento</h4>
							<input type="text" class="form-control input-lg" placeholder="dd/yy/yyyy"  data-inputmask="'alias':'dd/mm/yyyy'" data-mask id="fechaE" name="fechaE" >
						</div>

						<div class="col-lg-5">
							<h4>Telefono</h4>
							<input type="text" class="form-control input-lg" id="telefonoE" name="telefonoE" >
						</div>
						<div class="col-lg-5">
							<h4>Telefono2</h4>
							<input type="text" class="form-control input-lg" id="telefono2E" name="telefono2E" >
						</div>
						<div class="col-lg-5">
							<h4>Telefono3</h4>
							<input type="text" class="form-control input-lg" id="telefono3E" name="telefono3E" >
						</div>
						
						<div class="col-lg-5">
							<h4>Correo</h4>
							<input type="text" class="form-control input-lg" id="correoE" name="correoE" >
							
						</div>
						<div class="col-lg-5">
							<h4>Correo2</h4>
							<input type="text" class="form-control input-lg" id="correo2E" name="correo2E" >
							
						</div>
						<div class="col-lg-5">
							<h4>Institucion</h4>
							<input type="text" class="form-control input-lg" id="institucionE" name="institucionE" >
							
						</div>
						<div class="col-lg-5">
							<h4>Direccion</h4>
							<input type="text" class="form-control input-lg" id="direccionE" name="direccionE" >
							
						</div>


						<div class="col-lg-5">
							<h4>Foto</h4>
							<input type="file"  name="fotoE" id="fotoE" >
							<img src="Vistas/img/defecto.png
							efecto.png" class="img-thumbnail visor" width="300px";>
							<p class="help-block">Peso permitido de 200MB</p>
							<input type="hidden" name="imagenActual" id="imagenActual" >

						</div>


						<div class="col-lg-5">
							<h4>Nota</h4>
							<textarea name="notaE" id="notaE"  class="form-control input-lg"></textarea>
						</div class="col-lg-5">

						
					
					</div>
				</div>
		

				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Guardar Cambios</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

				<?php

				$actualizar = new funcionariosC();
				$actualizar -> ActualizarfuncionarioC();

				?>
			</div>
				
			</form>
		</div>
	</div>





<?php
$borrarD = new funcionariosC();
$borrarD -> BorrarfuncionarioC();

?>






<div class="content-wrapper">
	<section class="content-header">
		<h1>Lista de Contactos</h1>

	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				
				<a href="generarE.php" class="btn btn-success btn-flat">Generar Excel</a>
				<a href="generarW.php" class="btn btn-primary btn-flat">Generar Word</a>
			</div>


			<div class="box-body">

				<table class="table table-bordered table-hover table-striped  DT" id="example">
					<thead>
						<tr>
							<th>N</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Teléfono</th>
							<th>Teléfono2</th>

							<th>foto</th>
							<th>Perfil</th>
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
							
							
							<td><img src="'.$value["foto"].'" class="img-thumbnail"  width="100px" ></td>
							

							<td>
							<div class="btn-group">

						<a href="http://localhost/Usuarios/perfil/'.$value["id"].'" class="btn btn-primary btn-flat">Mi Perfil</a></td>

							
							
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

      
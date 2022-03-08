
<?php

 header('Content-Type: text/html; charset=ISO-8859-1');  //para que lea las mayusculas y minsuculas //
 
header("Content-type:application/vnd.ms-excel; charset=iso-8859-1");   //con esto cambioi a formato de excel // 
header("Content-Disposition: attachment; filename=contactos.xls");   //con esto cambio de nombre en fornmato de exccel //


require_once "Modelos/ConexionBD.php";  //conectamos a la base de datos //

//$conn=new ConexionBD(); // con esto instanciamos la clase Conexion BD//


//$link=$conn->cBD();  // traemos la clase estatica de la clase conexion BD //


//$cnx=mysqli_connect('localhost','root','','usuarios','3306');

//$query="SELECT * FROM doctores";
//$result = mysqli_query($cnx,$query);

$data=ConexionBD::cBD()->query("SELECT * FROM consultores")->fetchAll();   //variable data trae con la clase ConexionBD accede a la static  clase cBD y mediante consulta la base de datos consultores y con el fetchall trae  todos los valores  //


//$data=$link->query("SELECT * FROM consultores")->fetchAll();
date_default_timezone_set('America/Bogota');
?>
<header>
 <STRONG>HORA DE DESCARGA  : <?php echo date("d-m-Y  h:i:s A")?></STRONG> <HR>





</header>
<table  border="4">
				
					<tr>
						<BR>
						
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Cargo</th>
						<th>Fecha</th>
						<th>Telefono</th>
						<th>Telefono2</th>
						<th>Telefono3</th>
						<th>Correo</th>
						<th>Correo2</th>
						<th>Institucion</th>
						<th>direccion</th>
						<th>nota</th>
						<th>ciudad</th>
						<th>dni</th>
					
					</tr>
					<?php 

					 foreach ($data as $row ) { ?>
				
	
				<tr>
									
									<td><?php echo   utf8_decode($row["apellido"]) ;?></td>
									<td><?php echo   utf8_decode ($row["nombre"]) ;?></td>
									<td><?php echo   utf8_decode  ($row["cargo"]) ;?></td>
									<td><?php echo   utf8_decode  ($row["fecha"]) ;?></td>
									<td><?php echo   ($row["telefono"] );?></td>
									<td><?php echo   ($row["telefono2"] );?></td>
									<td><?php echo   ($row["telefono3"] );?></td>
									<td><?php echo   utf8_decode  ($row["correo"] );?></td>
									<td><?php echo   utf8_decode  ($row["correo2"] );?></td>
									<td><?php echo   utf8_decode ($row["institucion"]) ;?></td>
									<td><?php echo   utf8_decode ($row["direccion"]) ;?></td>
									<td><?php echo   utf8_decode ($row["nota"]) ;?></td>
									<td><?php echo   utf8_decode ($row["ciudad"]) ;?></td>
									<td><?php echo   utf8_decode ($row["dni"]) ;?></td>
						
				</tr>
				<?php

				 } 

			?>
				
</table>
